<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 50)->create();

      // Inserimento di due admin
    DB::table('users')->insert([
        'id'=> 51,
        'name'=> 'Tony',
        'surname'=> 'Stark',
        'email'=> 'loveYou3000@endgame.com',
        'email_verified_at' => now(),
        'password'=> '7049548a11ca1d08d017d2429bb04a3b', //invert HASH: cheeseburger
        'address'=> 'Via Avengers Tower',
        'street_number'=> '30',
        'avatar'=> 'userDefault.png',
        'is_admin'=> 1,
        'remember_token'=> Str::random(10),
    ]);

    DB::table('users')->insert([
        'id'=> 52,
        'name'=> 'Thanos',
        'surname'=> 'Titano',
        'email'=> 'iosonoineluttabile@destroy.com',
        'email_verified_at' => now(),
        'password'=> '50966274327acf97d6632b03c7740149', //invert HASH: gemme
        'address'=> 'Via Titano',
        'street_number'=> '6',
        'avatar'=> 'userDefault.png',
        'is_admin'=> 1,
        'remember_token'=> Str::random(10),
    ]);
    }
}
