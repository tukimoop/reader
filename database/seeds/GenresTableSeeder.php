<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'Action'
        ]);
        Genre::create([
            'name' => 'Adventure'
        ]);
        Genre::create([
            'name' => 'Cars'
        ]);
        Genre::create([
            'name' => 'Comedy'
        ]);
        Genre::create([
            'name' => 'Dementia'
        ]);
        Genre::create([
            'name' => 'Demons'
        ]);
        Genre::create([
            'name' => 'Drama'
        ]);
        Genre::create([
            'name' => 'Ecchi'
        ]);
        Genre::create([
            'name' => 'Fantasy'
        ]);
        Genre::create([
            'name' => 'Game'
        ]);
        Genre::create([
            'name' => 'Harem'
        ]);
        Genre::create([
            'name' => 'Hentai'
        ]);
        Genre::create([
            'name' => 'Historical'
        ]);
        Genre::create([
            'name' => 'Horror'
        ]);
        Genre::create([
            'name' => 'Josei'
        ]);
        Genre::create([
            'name' => 'Kids'
        ]);
        Genre::create([
            'name' => 'Magic'
        ]);
        Genre::create([
            'name' => 'Martial Arts'
        ]);
        Genre::create([
            'name' => 'Mecha'
        ]);
        Genre::create([
            'name' => 'Military'
        ]);
        Genre::create([
            'name' => 'Music'
        ]);
        Genre::create([
            'name' => 'Mystery'
        ]);
        Genre::create([
            'name' => 'Parody'
        ]);
        Genre::create([
            'name' => 'Police'
        ]);
        Genre::create([
            'name' => 'Psychological'
        ]);
        Genre::create([
            'name' => 'Romance'
        ]);
        Genre::create([
            'name' => 'Samurai'
        ]);
        Genre::create([
            'name' => 'School'
        ]);
        Genre::create([
            'name' => 'Sci-Fi'
        ]);
        Genre::create([
            'name' => 'Seinen'
        ]);
        Genre::create([
            'name' => 'Shoujo'
        ]);
        Genre::create([
            'name' => 'Shoujo Ai'
        ]);
        Genre::create([
            'name' => 'Shounen'
        ]);
        Genre::create([
            'name' => 'Shounen Ai'
        ]);
        Genre::create([
            'name' => 'Slice of Life'
        ]);
        Genre::create([
            'name' => 'Space'
        ]);
        Genre::create([
            'name' => 'Sports'
        ]);
        Genre::create([
            'name' => 'Super Power'
        ]);
        Genre::create([
            'name' => 'Supernatural'
        ]);
        Genre::create([
            'name' => 'Thriller'
        ]);
        Genre::create([
            'name' => 'Vampire'
        ]);
        Genre::create([
            'name' => 'Yaoi'
        ]);
        Genre::create([
            'name' => 'Yuri'
        ]);
    }
}
