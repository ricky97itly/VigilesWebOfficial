<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'user_id' => '1',
            'code_id' => '1',
            'zone_id' => '2',
            'title' => 'Hanno ucciso luomo ragno',
            'address' => 'Via nicola palmieri',
            'street_number' => '69',
            'description' => 'Spiderman voleva fare il giustiziere ma non conosce i marocchini nella zona di Ale',
            'tags' => 'marocchini, spiderman, morte, dioboia',
            'media' => '1_report_1554890133.jpg'
        ]);

        DB::table('reports')->insert([
            'user_id' => '1',
            'zone_id' => '3',
            'title' => 'Cristo è risorto',
            'address' => 'Via dai coglioni',
            'street_number' => '13',
            'description' => 'La madonna sta partorendo gesù',
            'tags' => 'gesu, madonna, parto, diocane',
            'media' => '1_report_1554890133.jpg'
        ]);
    }
}
