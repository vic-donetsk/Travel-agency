<?php

use Illuminate\Database\Seeder;
use App\Models\Media;


class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Media::class, 50)->create();
    }
}
