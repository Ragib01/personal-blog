<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

// Model...
use App\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index)
        {
            Slider::create([
                'title'       => $faker->sentence,
                'image'       => 'category_demo.jpg',
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
