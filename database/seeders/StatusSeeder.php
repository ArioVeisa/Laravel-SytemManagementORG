<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'pending_sekretaris'],
            ['name' => 'pending_presiden'],
            ['name' => 'approved'],
            ['name' => 'rejected'],
        ]);
    }
}
