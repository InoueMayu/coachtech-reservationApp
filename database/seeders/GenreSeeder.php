<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                'name' => '寿司',
            ],
            [
                'name' => '焼肉',
            ],
            [
                'name' => '居酒屋',
            ],
            [
                'name' => 'ラーメン',
            ],
            [
                'name' => 'イタリアン',
            ],

        ];

        foreach ($genres as $genre) {
            Genre::create(array(
                'name' => $genre['name']
            ));
    }
}

}
