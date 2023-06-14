<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $movies = [
            'movie' =>  [
                'title' => 'Avatar',
                'description' => 'Avatar: The Way of Water is a 2022 American epic science fiction film directed and produced by James Cameron. ',
                'year' => '2022',
                'category_id' => 1,
                'platform_id' => 3,
                'user_id' => 1,
                'url_image' => 'https://cdn.pixabay.com/photo/2023/06/03/12/52/lantana-8037634_1280.jpg'
            ],
            'movie_0' =>  [
                'title' => 'John Wick',
                'description' => 'John Wick uncovers a path to defeating The High Table.. ',
                'year' => '2023',
                'category_id' => 2,
                'platform_id' => 2,
                'user_id' => 1,
                'url_image' => 'https://cdn.pixabay.com/photo/2023/06/03/12/52/lantana-8037634_1280.jpg'
            ],
            'movie_1' =>  [
                'title' => 'Love Again',
                'description' => 'Coping with the loss of her fiance, Mira Ray sends a series of romantic texts to his old cellphone number, not realizing it was reassigned to journalist Rob Burns.  ',
                'year' => '2020',
                'platform_id' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'url_image' => 'https://trailers.apple.com/trailers/sony_pictures/love-again/images/poster_2x.jpg'
            ],
            'movie_2' =>  [
                'title' => 'FASTX',
                'description' => 'Over many missions and against impossible odds, Dom Toretto and his family have outsmarted and outdriven every foe in their path. ',
                'year' => '2023',
                'platform_id' => 3,
                'category_id' => 5,
                'user_id' => 1,
                'url_image' => 'https://m.media-amazon.com/images/M/MV5BNzZmOTU1ZTEtYzVhNi00NzQxLWI5ZjAtNWNhNjEwY2E3YmZjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_FMjpg_UX1000_.jpg'
            ]
            ];

            foreach ($movies as $title => $value) {
                DB::table('movies')->insert([
                    'title' => $value['title' ],
                    'description' => $value['description'],
                    'year' => $value['year'],
                    'url_image' => $value['url_image'],
                    'platform_id' => $value['platform_id'],
                    'category_id' => $value['category_id'],
                    'user_id' => 1,
                ]);
            }
        //
    }
}