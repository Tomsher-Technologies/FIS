<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=BouncerSeeder

        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'superadmin',
            'title' => 'Super Admin',
        ]);

        // $user = User::create([
        //     'name' => "Admin",
        //     'email' => "admin@dmu.com",
        //     'password' => Hash::make('password'),
        // ]);

        // $admin = Bouncer::role()->firstOrCreate([
        //     'name' => 'editor',
        //     'title' => 'Editor',
        // ]);

        Bouncer::allow('superadmin')->everything();

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'manage-users',
            'title' => 'Manage Users',
        ]);

        $user = User::find(1);
        $user->assign('superadmin');
        Bouncer::allow('superadmin')->everything();
    }
}
