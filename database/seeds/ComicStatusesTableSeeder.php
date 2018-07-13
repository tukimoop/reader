<?php

use App\Models\ComicStatus;
use Illuminate\Database\Seeder;

class ComicStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComicStatus::create([
            'name' => 'Active',
            'description' => 'This project is actively being updated.',
        ]);
        ComicStatus::create([
            'name' => 'In Planning',
            'description' => 'This project has been scheduled to be worked on.',
        ]);
        ComicStatus::create([
            'name' => 'On Hold',
            'description' => 'This project has not been dropped but is not currently being updated.',
        ]);
        ComicStatus::create([
            'name' => 'Dropped',
            'description' => 'This project has been dropped.',
        ]);
        ComicStatus::create([
            'name' => 'Hidden',
            'description' => 'This project is only visible to super administrators.',
            'hide_comic' => true
        ]);
    }
}
