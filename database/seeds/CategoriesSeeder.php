<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'SLR'
        ]);
        \App\Category::create([
            'name' => 'DSLR'
        ]);
        \App\Category::create([
            'name' => 'MIRRORLESS'
        ]);
    }
}
