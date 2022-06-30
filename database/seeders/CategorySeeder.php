<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_rus' => "Моды",
            'category_eng' => "Mods",
        ]);DB::table('categories')->insert([
            'category_rus' => "Текстурпаки",
            'category_eng' => "Texturepacks",
        ]);DB::table('categories')->insert([
            'category_rus' => "Карты",
            'category_eng' => "Maps",
        ]);DB::table('categories')->insert([
            'category_rus' => "Скины",
            'category_eng' => "Skins",
        ]);
    }
}
