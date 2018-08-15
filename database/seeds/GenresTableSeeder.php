<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    private $genres = [
        [
            'name' => 'Action'
        ],
        [
            'name' => 'Adventure'
        ],
        [
            'name' => 'Cars'
        ],
        [
            'name' => 'Comedy'
        ],
        [
            'name' => 'Dementia'
        ],
        [
            'name' => 'Demons'
        ],
        [
            'name' => 'Drama'
        ],
        [
            'name' => 'Ecchi'
        ],
        [
            'name' => 'Fantasy'
        ],
        [
            'name' => 'Game'
        ],
        [
            'name' => 'Harem'
        ],
        [
            'name' => 'Hentai'
        ],
        [
            'name' => 'Historical'
        ],
        [
            'name' => 'Horror'
        ],
        [
            'name' => 'Josei'
        ],
        [
            'name' => 'Kids'
        ],
        [
            'name' => 'Magic'
        ],
        [
            'name' => 'Martial Arts'
        ],
        [
            'name' => 'Mecha'
        ],
        [
            'name' => 'Military'
        ],
        [
            'name' => 'Music'
        ],
        [
            'name' => 'Mystery'
        ],
        [
            'name' => 'Parody'
        ],
        [
            'name' => 'Police'
        ],
        [
            'name' => 'Psychological'
        ],
        [
            'name' => 'Romance'
        ],
        [
            'name' => 'Samurai'
        ],
        [
            'name' => 'School'
        ],
        [
            'name' => 'Sci-Fi'
        ],
        [
            'name' => 'Seinen'
        ],
        [
            'name' => 'Shoujo'
        ],
        [
            'name' => 'Shoujo Ai'
        ],
        [
            'name' => 'Shounen'
        ],
        [
            'name' => 'Shounen Ai'
        ],
        [
            'name' => 'Slice of Life'
        ],
        [
            'name' => 'Space'
        ],
        [
            'name' => 'Sports'
        ],
        [
            'name' => 'Super Power'
        ],
        [
            'name' => 'Supernatural'
        ],
        [
            'name' => 'Thriller'
        ],
        [
            'name' => 'Vampire'
        ],
        [
            'name' => 'Yaoi'
        ],
        [
            'name' => 'Yuri'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->genres as $genre) {
            Genre::create($genre);
        }
    }
}
