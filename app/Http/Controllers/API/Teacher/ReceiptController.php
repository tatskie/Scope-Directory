<?php

namespace app\Http\Controllers\API\Teacher;

use PDF;
use App\User;
use App\Receipt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrderLicenceAdminNotification;
use App\Notifications\OrderLicenceTeacherNotification;

class ReceiptController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:teacher', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); // User who loggedin

        return Receipt::where('user_id', $user->id)->with('tif', 'licenseCategory')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|integer',
            'aif_id'=>'required|required',
            'category_id'=>'required|integer',
        ]);

        $number = $request->get('user_id'). '-' .time();

        $receipt = new Receipt([
            'number' => $number,
            'expire_at' => Carbon::now()->addYears(2),
            'user_id' => $request->get('user_id'),
            'tif_id' => $request->get('tif_id'),
            'category_id' => $request->get('category_id')
        ]);

        $receipt->save();

        $user = User::findOrFail($request->get('user_id'));

        $user->notify(new OrderLicenceTeacherNotification());

        $users = User::role('admin')->get();

        foreach ($users as $admin) {
            $admin->notify(new OrderLicenceAdminNotification());
        }

        return ['message' => "Success"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadReceipt($id)
    {
        $receipt = Receipt::findOrFail($id);

        $pdf = PDF::loadView('teacher.reciepts.pdf', ['receipt' => $receipt]);
        return $pdf->download('invoice.pdf');
        // $pdf = PDF::loadView('teacher.reciepts.pdf', ['receipt' => $receipt]);
        // return $pdf->download('invoice.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
