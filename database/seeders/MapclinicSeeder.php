<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapclinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create three MapClinic entries 
        // DB::table( table: 'mapclinics')->insert([
        //     'map_name' => 'คลินิกโรคผิวหนัง',
        //     'address' => '212 Thep Yothi Road, Mueang District Mueang, Mueang District, อุบลราชธานี 34000',
        //     'city' => 'อุบลราชธานี',
        //     'state' => 'FL',
        //     'hours' => '9:30–16:00',
        //     'latitude' => '15.2352744',
        //     'longitude' => '104.8625083',
        // ]);
    }
}
