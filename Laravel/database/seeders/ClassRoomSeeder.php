<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\classRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['name' => '1A'],
            ['name' => '1B'],
            ['name' => '1C'],

            ['name' => '2A'],
            ['name' => '2B'],
            ['name' => '2C'],

            ['name' => '3A'],
            ['name' => '3B'],
            ['name' => '3C'],
        ];
        foreach ($data as  $value) {

            ClassRoom::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // classRoom::factory(10)->create();
    }
}
