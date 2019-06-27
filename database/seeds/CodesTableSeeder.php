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
      // 1
        DB::table('codes')->insert([
            'color' => 'pending'
        ]);
        // 2
        DB::table('codes')->insert([
            'color' => 'green'
        ]);
        // 3
        DB::table('codes')->insert([
            'color' => 'yellow'
        ]);
        // 4
        DB::table('codes')->insert([
            'color' => 'red'
        ]);
    }
}
