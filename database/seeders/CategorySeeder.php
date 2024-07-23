<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();

        //svuoto tabella prima di popolarla
        Category::truncate();

        //array di partenza
        $categories = ['Frontend', 'Backend', 'AI', 'Data Analytics', 'Fullstack'];

        foreach ($categories as $category) {

            $new_category = new Category();

            $new_category->title = $category;
            $new_category->slug = Str::of($category)->slug();

            $new_category->save();
        }


        Schema::enableForeignKeyConstraints();
    }
}
