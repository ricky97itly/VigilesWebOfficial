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
    factory(App\Report::class, 5)->create();

    DB::table('reports')->insert([
      'user_id'=> 3,
      'code_id'=> 3,
      'zone_id'=> 1,
      'title' => "Rottura tubo del gas",
      'address' => "Via lodovico montegani",
      'street_number' => 12,
      'description' => "Sto tubo del gas si è spaccato in un centro commerciale in via francesco sforza a Milano e ",
      'tags'=> "Tubo, gas, perdita",
      'media'=> "http://lorempixel.com/output/cats-q-c-640-480-9.jpg"
    ]);

    DB::table('reports')->insert([
      'user_id'=> 15,
      'code_id'=> 4,
      'zone_id'=> 6,
      'title' => "Incidente mortale",
      'address' => "Via neera",
      'street_number' => 4,
      'description' => "Il bus dello ied si è schiantato contro la piadineria, 30 morti",
      'tags'=> "Morti, piadine, bus",
      'media'=> "http://lorempixel.com/output/cats-q-c-640-480-3.jpg"
    ]);

    DB::table('reports')->insert([
      'user_id'=> 31,
      'code_id'=> 2,
      'zone_id'=> 2,
      'title' => "Ho perso il gatto",
      'address' => "Via innocenzo isimbardi",
      'latitude' => "45.432890",
      'longitude' => "9.180479",
      'street_number' => 54,
      'description' => "Il mio gatto è scappato vi prego trovatelo se no stommale",
      'tags'=> "gatto, scappato, stommale",
      'media'=> "http://lorempixel.com/output/cats-q-c-640-480-5.jpg"
    ]);
  }
}
