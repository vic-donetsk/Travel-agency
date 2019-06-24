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
	        'first_name' => 'Vic',
	        'last_name' => 'Pavlovsky',
	        'phone' => '+38095-698-62-73', 
	        'email' => 'pavlovskyi.tester@va',
	        'avatar' => '',
	        'password' => Hash::make('test'),
	        //'email_verified_at' => now(),
	        //'remember_token' => Str::random(10),
        ]);


        factory(User::class, 50)->create();

    }
}
