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
            'zone' => 'Zona 1'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 2'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 3'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 4'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 5'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 6'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 7'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 8'
        ]);

        DB::table('zones')->insert([
            'zone' => 'Zona 9'
        ]);
    }
}
