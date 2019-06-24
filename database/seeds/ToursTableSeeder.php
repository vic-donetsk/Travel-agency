<?php

use Illuminate\Database\Seeder;
use App\Models\Tour;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tour::class, 200)->create()->each( function($tour) {
        	$randomPicturesQuantity = rand(0, 10);
        	$randomPictures = Media::where('id', '!=', $tour->main_img_id)->random($randomPicturesQuantity);
        	$ids = $randomPictures->pluck('id')->all();
        	$tour->media()->attach($ids);
        });;
    }
}
