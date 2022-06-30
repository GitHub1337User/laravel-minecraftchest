<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i!=20;$i++){
            DB::table('articles')->insert([
                'category_id' => rand(1,4),
                'title' => "Article ".$i,
                'content' => $i.") Article content Article content Article content Article content Article content Article content",
                'preview' => 'https://via.placeholder.com/1'.rand(100,500).'/000000/FFFFFF',
                'download_link' => 'https://'.Str::random(10),
                'version_id' => rand(1,10),
                'user_id' => rand(1,60),
                'created_at'=>date('Y-m-d'),
            ]);
        }
    }
}
