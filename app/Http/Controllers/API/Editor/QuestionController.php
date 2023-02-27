<?php

namespace App\Http\Controllers\API\Editor;

use App\QuestionAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:editor', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backCardData()
    {
        $answers = QuestionAnswer::where('user_id', auth()->user()->id)->where('is_tif', false)->with(['question', 'followupQuestion'])->get();

        $data = collect([]);

        $affiliation = QuestionAnswer::where('user_id', auth()->user()->id)->where('question_id', 2)->where('is_tif', false)->first();

        if ($affiliation) {
            $data->put('affiliation', $affiliation->answer);
        } else {
            $data->put('affiliation', 'N/A');
        }

        $board = QuestionAnswer::where('user_id', auth()->user()->id)->where('question_id', 5)->where('followup_id', 3)->where('is_tif', false)->first();

        if ($board) {
            $data->put('board', $board->answer);
        } else {
            $data->put('board', 'N/A');
        }


        $tesol = QuestionAnswer::where('user_id', auth()->user()->id)->where('question_id', 11)->where('followup_id', 4)->where('is_tif', false)->first();

        if ($tesol) {
            $data->put('tesol', $tesol->answer);
        } else {
            $data->put('tesol', 'N/A');
        }

        $validity = auth()->user()->receipts->last();; // validity

        if ($validity) {
            $data->put('validity', date('d/m/Y', strtotime($validity->created_at->addYear(2))));
        } else {
            $data->put('validity', date('d/m/Y', strtotime(auth()->user()->created_at->addYear(2))));
        }

        return $data;
    }
}
