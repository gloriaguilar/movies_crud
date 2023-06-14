<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $platforms =[
            'netflix' =>  [
                'title' => 'Netflix',
                'url' => 'www.netflix.com',
                'image_url' => 'https://images.ctfassets.net/4cd45et68cgf/Rx83JoRDMkYNlMC9MKzcB/2b14d5a59fc3937afd3f03191e19502d/Netflix-Symbol.png?w=700&h=456',
                'user_id' => 1,
            ],
            'pm' =>  [
                'title' => 'Prime Video',
                'url' => 'www.primevideo.com',
                'image_url' => 'https://play-lh.googleusercontent.com/Y7drWZZo_F2GBE1RhjR1irOkE3yrtPorHS1U9YkLKAu1DnTjQ8gNbcRmrBtkd3tnHQ',
                'user_id' => 1,
            ],
            'hbo' =>  [
                'title' => 'Hbo',
                'url' => 'www.hbo.com',
                'image_url' => 'https://hips.hearstapps.com/hmg-prod/images/3xj-pofb-400x400-1590594586.png',
                'user_id' => 1,
            ],
        ];

        foreach ($platforms as $title => $value) {
            DB::table('platforms')->insert([
                'title' => $value['title' ],
                'url' => $value['url'],
                'image_url' => $value['image_url'],
                'user_id' => 1,
            ]);
        }
    }
}