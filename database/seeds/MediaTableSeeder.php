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

        // эта запись должна остаться и в продакшене
        Media::create([
            'path' => 'storage/app/public/empty-pic.png'
        ]);
        // а это уже чисто тестовые значения
        factory(Media::class, 100)->create();
    }
}
