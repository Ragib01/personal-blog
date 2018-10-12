<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

// Model...
use App\Models\GalleryCategory;

class GalleryCategorySeeder extends Seeder
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
            GalleryCategory::create([
                'title'       => $faker->sentence,
                'description' => $faker->paragraph,
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
