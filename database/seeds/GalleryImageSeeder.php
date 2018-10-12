<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

//Model
use App\Models\GalleryImage;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 5) as $index)
        {
            GalleryImage::create([
                'title'       => $faker->sentence,
                'image'       => 'category_demo.jpg',
                'category_id' => $faker->numberBetween(1, 5),
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
