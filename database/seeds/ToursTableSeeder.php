<?php

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Media;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tour::class, 2000)->create()->each( function($tour) {
        	$randomPicturesQuantity = rand(0, 10);
        	$randomPictures = Media::where('id', '!=', $tour->main_img_id)->get()->random($randomPicturesQuantity);
        	$ids = $randomPictures->pluck('id')->all();
        	$tour->media()->attach($ids);
        });;
    }
}
