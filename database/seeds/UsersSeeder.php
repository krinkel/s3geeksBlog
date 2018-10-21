<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        DB::table('users')->truncate();

        User::create([
            'name'      =>  'admin',
            'email'     =>  config('mail.webmaster_email'),
            'role'      =>  'admin',
            'password'  =>  bcrypt('password'),
        ]);
    }
}
