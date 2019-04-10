<?php

use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            'zone' => 'Zona Centro Milano'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona Dimmerda Milano'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona a Muzzo Milano'
        ]);
    }
}
