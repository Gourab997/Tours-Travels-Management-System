<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'password'=>Hash::make('12345678'),
                'fullname'=>'Employee baba',
                'username'=>'Employee',
                'email'=>'employee@employee.com',
                'type'=>'employee',
                'bloodgroup'=>'O+',
                'gender'=>'female',
            ),
            array(
                'password'=>Hash::make('12345678'),
                'fullname'=>'Admin baba',
                'username'=>'admin',
                'email'=>'admin@admin.com',
                'type'=>'admin',
                'bloodgroup'=>'A+',
                'gender'=>'male',
            ),
            array(
                'password'=>Hash::make('12345678'),
                'fullname'=>'Account baba',
                'username'=>'Account',
                'email'=>'Account@Account.com',
                'type'=>'account',
                'bloodgroup'=>'AB+',
                'gender'=>'female',
            ),
            array(
                'password'=>Hash::make('12345678'),
                'fullname'=>'Guide baba',
                'username'=>'Guide',
                'email'=>'guide@guide.com',
                'type'=>'guide',
                'bloodgroup'=>'A-',
                'gender'=>'male',
            ),
           
        );

        DB::table('users')->insert($data);
    }
}
