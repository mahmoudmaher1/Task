<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = \App\Company::create([
            'name' => 'company name',
            'email' => 'company email',
            'website' => 'company website',
            'role_id'=>1,
        ]);

        $employees = \App\Employee::create([
            'firstName' => 'Employee firstName',
            'lastName' => 'Employee lastName',
            'company' => 'Employee company',
            'email' => 'Employee email',
            'phone' => 'Employee phone',
            'role_id'=>2,
        ]);




        $companies->attachRole('Company Page');
        $employees->attachRole('Employees Page');


    }//end of run

}//end of users table seeder
