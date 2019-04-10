<?php

use Illuminate\Database\Seeder;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codes')->insert([
            'color' => 'pending'
        ]);

        DB::table('codes')->insert([
            'color' => 'green'
        ]);

        DB::table('codes')->insert([
            'color' => 'yellow'
        ]);

        DB::table('codes')->insert([
            'color' => 'red'
        ]);
    }
}
