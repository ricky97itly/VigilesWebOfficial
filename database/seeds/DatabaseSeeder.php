<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    // Riempie DB con faker creati in precedenza
    $this->call([
      UsersTableSeeder::class,
      CodesTableSeeder::class,
      ZonesTableSeeder::class,
      ReportsTableSeeder::class
    ]);
  }
}
