<?php


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('assigned_roles')->truncate();
        DB::table('corporates')->truncate();
        DB::table('projects')->truncate();

        $users = array(
            array(  
                'name' => 'lukman',
                'username' => 'lukman',
                'email' => 'lukman@email.com',
                'password' => Hash::make('lukman'),
                'confirmed' => true,
                'phone_mobile' => '08123456789',
                'phone_extension' => '08123456789',
                'corporate_id' => '1',
            ),
            array(  
                'name' => 'agung',
                'username' => 'agung',
                'email' => 'agung@email.com',
                'password' => Hash::make('agung'),
                'confirmed' => true,
                'phone_mobile' => '08123456789',
                'phone_extension' => '08123456789',
                'corporate_id' => '2',
            ),
            array(  
                'name' => 'raymond',
                'username' => 'raymond',
                'email' => 'raymond@email.com',
                'password' => Hash::make('raymond'),
                'confirmed' => true,
                'phone_mobile' => '08123456789',
                'phone_extension' => '08123456789',
                'corporate_id' => '2',
            ),
        );

        $roles = array(
            array(  
                'name' => 'Admin',
            ),
            array(  
                'name' => 'Client',
            ),
        );

        $assigned_roles = array(
            array(  
                'user_id' => '1',
                'role_id' => '1',
            ),
            array(  
                'user_id' => '2',
                'role_id' => '2',
            ),
            array(  
                'user_id' => '3',
                'role_id' => '2',
            ),
        );

        $corporates = array(
            array(  
                'name' => 'PT Verevitajaya',
                'phone' => '02155667788',
                'email' => 'verevitajaya@vitajaya.com',
                'address' => 'jl. pantai mutiara no 99, jakarta utara',
            ),
            array(  
                'name' => 'PT Indobaloon',
                'phone' => '02155667788',
                'email' => 'indobaloon@indobaloon.com',
                'address' => 'jl. MH thamrin no 15, jakarta utara',
            ),
        );

        $projects = array(
            array(  
                'name' => 'Project for PT Verevitajaya',
                //'description' => 'this is desciption for verevitajaya project',
                'url' => 'http://vitajaya.com/',
                'corporate_id' => 1,
            ),
            array(  
                'name' => 'Project for PT Indobaloon',
                //'description' => 'this is first project for us',
                'url' => 'http://indobalon.com/',
                'corporate_id' => 2,
            ),
        );


        // make sure you do the insert
        DB::table('users')->insert($users);
        DB::table('roles')->insert($roles);
        DB::table('assigned_roles')->insert($assigned_roles);
        DB::table('corporates')->insert($corporates);
        DB::table('projects')->insert($projects);
    }

}