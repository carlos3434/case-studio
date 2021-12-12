<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
  
        $csvFile = fopen(base_path("employee_data.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Employee::create([
                    'employee_id' => $data['0'],
                    'name_prefix' => $data['1'],
                    'first_name' => $data['2'],
                    'middle_initial' => $data['3'],
                    'last_name' => $data['4'],
                    'gender' => $data['5'],
                    'email' => $data['6'],
                    'fathers_name' => $data['7'],
                    'mothers_name' => $data['8'],
                    'mothers_maiden_name' => $data['9'],
                    'date_of_birth' => date("Y-m-d", strtotime( $data['10'])),
                    'date_of_joining' => date("Y-m-d", strtotime( $data['11'])),
                    'salary' => $data['12'],
                    'ssn' => $data['13'],
                    'phone' => $data['14'],
                    'city' => $data['15'],
                    'state' => $data['16'],
                    'zip' => $data['17'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
