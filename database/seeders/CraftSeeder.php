<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i!=60;$i++){
            DB::table('crafts')->insert([
                'name' => "Craft ".$i,
                'description' =>"Description ".$i,
                'version_id' =>rand(1,9),
                'preview' =>'https://via.placeholder.com/1'.rand(10,50).'/000000/FFFFFF',
                'created_at'=>date('Y-m-d'),
            ]);
        }
    }
}
