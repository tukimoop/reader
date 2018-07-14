<?php

use Illuminate\Database\Seeder;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        Bouncer::ability()->firstOrCreate([
            'name' => 'access-admin',
            'title' => 'Access Admin Panel',
        ]);

        // Content
        Bouncer::ability()->firstOrCreate([
            'name' => 'view-content',
            'title' => 'View Content',
        ]);

        // Comics
        Bouncer::ability()->firstOrCreate([
            'name' => 'view-comics',
            'title' => 'View Comics',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'manage-comics',
            'title' => 'Manage Comics',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'delete-comics',
            'title' => 'Delete Comics',
        ]);

        // Members
        Bouncer::ability()->firstOrCreate([
            'name' => 'view-members',
            'title' => 'View Members',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'manage-members',
            'title' => 'Manage Members',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'ban-members',
            'title' => 'Ban Members',
        ]);

        // System
        Bouncer::ability()->firstOrCreate([
            'name' => 'view-settings',
            'title' => 'View System Settings',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'manage-settings',
            'title' => 'Manage System Settings',
        ]);
        Bouncer::ability()->firstOrCreate([
            'name' => 'view-audit',
            'title' => 'View Audit Logs',
        ]);
    }
}
