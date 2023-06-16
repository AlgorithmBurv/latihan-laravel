<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\ClassRoomSeeder;
use Database\Seeders\ExtracurricularSeeder;
use Database\Seeders\Student_ExtracurricularSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            //ketikkan paret dahulu baru childnya
            ClassRoomSeeder::class,
            RoleSeeder::class,
            StudentSeeder::class,
            UserSeeder::class,


        ]);
    }
}
