<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
	    app()['cache']->forget('spatie.permission.cache');

	    // corporate role
	    Role::create(['name' => 'corporate']);
	    
	     /** 
	     * @var \App\User $user 
	     */
	    $corporate = factory(\App\User::class)->create([
	        'name' => 'Corporate User',
	        'username' => 'corporate',
	        'email' => 'corporate@example.com',
	        'email_verified_at' => Carbon::now(),
	        'password' => Hash::make('P&c7*)bCm&'),
	    ]);
	    
	    $corporate->assignRole('corporate');

	    // teacher role
	    Role::create(['name' => 'teacher']);
	     /** 
	     * @var \App\User $user 
	     */
	    $teacher = factory(\App\User::class)->create([
	        'name' => 'Teacher User',
	        'username' => 'teacher',
	        'email' => 'teacher@example.com',
	        'email_verified_at' => Carbon::now(),
	        'password' => Hash::make('P&c7*)bCm&'),
	    ]);

	    DB::table('answer_scores')->insert([
            'user_id' => $teacher->id,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
	    
	    $teacher->assignRole('teacher');

	    // academia role
	    Role::create(['name' => 'academia']);
	     /** 
	     * @var \App\User $user 
	     */
	    $academia = factory(\App\User::class)->create([
	        'name' => 'Academia User',
	        'username' => 'academia',
	        'email' => 'academia@example.com',
	        'email_verified_at' => Carbon::now(),
	        'password' => Hash::make('R<whF84pj,'),
	    ]);

	    DB::table('answer_scores')->insert([
            'user_id' => $academia->id,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
	    
	    $academia->assignRole('academia');

	    // undergrad role
	    Role::create(['name' => 'undergrad']);
	     /** 
	     * @var \App\User $user 
	     */
	    $undergrad = factory(\App\User::class)->create([
	        'name' => 'undergrad User',
	        'username' => 'undergrad',
	        'email' => 'undergrad@example.com',
	        'email_verified_at' => Carbon::now(),
	        'password' => Hash::make('Z$whF63op,'),
	    ]);

	    DB::table('answer_scores')->insert([                
            'user_id' => $undergrad->id,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
	    
	    $undergrad->assignRole('undergrad');
	    
	    // admin role
	    Role::create(['name' => 'admin']);

	    /** 
	     * @var \App\User $user 
	     */
	    $admin = factory(\App\User::class)->create([
	        'name' => 'Administrator',
	        'username' => 'admin',
	        'email' => 'tesol.licence@gmail.com',
	        'email_verified_at' => Carbon::now(),
	        'password' => Hash::make('L~n3Gk<bF<'),
	    ]);

	    $admin->assignRole('admin');
    }
}
