<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'role_id'           =>2,
                'name'              =>  'BlugMaster Admin',
                'email'             =>  'admin@admin.com',

                'password'          =>  bcrypt('secret'),

                'address'           =>  'Kathmandu',
                'phone_no'          =>  '9844665734',
                'gender'            =>  'Male',
                'interests'         => 'Travelling',
                'is_active'         => true,
                'phone_verified'    =>  true,
                'email_verified'    =>  true,
            ]
        );
    }
}
