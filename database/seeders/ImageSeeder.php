<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i!=60;$i++){
            DB::table('images')->insert([
                'article_id' => rand(1,20),
                'image' =>'https://via.placeholder.com/1'.rand(100,500).'/000000/FFFFFF',
            ]);
        }
    }
}
