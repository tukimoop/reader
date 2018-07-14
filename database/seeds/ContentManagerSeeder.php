<?php

use Illuminate\Database\Seeder;

class ContentManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Bouncer::role()->create([
            'name' => 'content-manager',
            'title' => 'Content Manager',
        ]);

        Bouncer::allow($admin)->to([
            'access-admin', 'view-content', 'view-comics',
            'manage-comics'
        ]);
    }
}
