<?php


use Faker\Factory;
use Illuminate\Database\Seeder;

//Model
use App\Models\Breaking;

class BreakingTableSeeder extends Seeder
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
            Breaking::create([
                'title'       => $faker->sentence,
                'status' => $faker->numberBetween(1, 5),
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
