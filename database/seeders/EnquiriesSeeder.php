<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnquiriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=EnquiriesSeeder
     * @return void
     */
    public function run()
    {
        \App\Models\Enquiries::factory(20)->create();
    }
}
