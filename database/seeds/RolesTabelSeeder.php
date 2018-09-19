<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \App\Role::create([
            'name' => 'Company Page',
            'display_name' => 'Company Page',
            'description' => 'Company Page'
        ]);

        $employees = \App\Role::create([
            'name' => 'Employees Page',
            'display_name' => 'Employees Page',
            'description' => 'Employees Page'
        ]);



    }//end of run

}//end of roles table seeder
