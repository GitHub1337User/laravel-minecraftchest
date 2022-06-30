<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i!=20;$i++){
            DB::table('comments')->insert([
                'text' => "By User ".$i.": Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, vel.",
                'article_id' => rand(1,20),
                'user_id' => rand(1,60),
                'created_at'=>date('Y-m-d'),
            ]);
        }
    }
}
