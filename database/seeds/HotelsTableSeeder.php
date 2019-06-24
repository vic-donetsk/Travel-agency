<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Hotel::create([
			'name' => '5*']);        
        App\Models\Hotel::create([
			'name' => '4*']);        
        App\Models\Hotel::create([
			'name' => '3*']);        
        App\Models\Hotel::create([
			'name' => '2*']);        
        App\Models\Hotel::create([
			'name' => 'Бунгало']);        
        App\Models\Hotel::create([
			'name' => 'Общежитие']);        
        App\Models\Hotel::create([
			'name' => 'Под звездным небом']);
    }
}
