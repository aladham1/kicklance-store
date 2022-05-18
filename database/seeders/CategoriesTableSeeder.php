<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Category 4',
            'description' => 'Category 4 description',
            'slug' =>  Str::slug('Category 4'),
            'parent_id' => 3
        ]);
    }
}


