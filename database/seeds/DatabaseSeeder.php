<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call(AboutTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(BlogCategoryTableSeeder::class);
        $this->call(BlogPostTableSeeder::class);
        $this->call(GalleryCategorySeeder::class);
        $this->call(GalleryImageSeeder::class);
        $this->call(ProjectCategoryTableSeeder::class);
        $this->call(ProjectPostTableSeeder::class);
        $this->call(ResearchCategoryTableSeeder::class);
        $this->call(ResearchPostTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(BreakingTableSeeder::class);
    }
}
