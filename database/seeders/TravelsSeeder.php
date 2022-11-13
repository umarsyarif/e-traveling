<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Seeder;

class TravelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Travel::create([
            'name' => 'Labuan Bajo',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consectetur libero dolor voluptatum impedit natus nihil at ratione quidem expedita deleniti, tempora minus! Dolor voluptatum tempore similique dicta explicabo. Exercitationem?',
            'quota' => 10,
            'start_date' => date('Y-m-d', strtotime(today() . '+ 2 days')),
            'end_date' => date('Y-m-d', strtotime(today() . '+ 7 days')),
            'hotel_name' => 'Grand Zuri',
            'price' => '5000000',
            'img' => '',
        ]);
    }
}
