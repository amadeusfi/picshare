<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Native American Tribes
			']);
        Category::create(['name' => 'Native American Empires
			']);
        Category::create(['name' => 'Native American  Musical Instruments
			']);
        Category::create(['name' => 'Native American Rituals
			']);
        Category::create(['name' => 'Native American Modern Food  
			']);
        Category::create(['name' => 'Native American Architecture
			']);
        Category::create(['name' => 'Native American Ancestral Culture
			']);
        Category::create(['name' => 'Native American Modern Culture
			']);
        Category::create(['name' => 'Afro American Culture
			']);
        Category::create(['name' => 'Afro American Rituals
			']);
        Category::create(['name' => 'Latin America Landscapes
			']);
    }
}
