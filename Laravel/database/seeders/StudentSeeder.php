<?php

namespace Database\Seeders;


use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // student::factory()->create();



        Student::factory()->count(100)->create();

        // Schema::disableForeignKeyConstraints();
        // student::truncate();
        // Schema::enableForeignKeyConstraints();
        // $data = [
        //     ['name' => 'Dadang', 'class_id' => '1', 'gender' => 'L', 'nis' => '10234'],
        //     ['name' => 'Maman', 'class_id' => '2', 'gender' => 'L', 'nis' => '17834'],
        //     ['name' => 'Sunani', 'class_id' => '3', 'gender' => 'P', 'nis' => '34234'],
        //     ['name' => 'Pengki', 'class_id' => '4', 'gender' => 'L', 'nis' => '56234']


        // ];
        // foreach ($data as  $value) {

        //     student::insert([
        //         'name' => $value['name'],
        //         'class_id' => $value['class_id'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],

        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

    }
}
