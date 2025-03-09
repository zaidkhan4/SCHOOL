<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Day::insert([

            ['name'=>'Monday'],
            ['name'=>'Tuesday'],
            ['name'=>'Wednesday'],
            ['name'=>'Thursday'],
            ['name'=>'Friday'],
            ['name'=>'Saturday'],
            ['name'=>'Sunday'],

        ]);
    }
}
