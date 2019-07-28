<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => '',
            'last_name' => '',
            'phone' => '', 
            'email' => 'a@a.a',
            'avatar' => '',
            'password' => Hash::make('aaaaaaaa'),
            //'email_verified_at' => now(),
            //'remember_token' => Str::random(10),
        ]);


        factory(User::class, 50)->create();

    }
}
