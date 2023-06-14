<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            'Thriller',
            'Comedy',
            'Romance',
            'Drama',
            'Documental',
            'Horror',
            'Scifi'
        ];


        for($i=0; $i<count($categories); $i++){

            DB::table('categories')->insert([
                'title'=> $categories[$i],
                'description'=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation",
                'user_id'=> 1
            ]);
        }

        //
    }
}