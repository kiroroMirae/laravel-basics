<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('post_statuses')->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'draft',
            'archived',
            'active'
        ];

        foreach ($data as $d) {
            PostStatus::create(['name'=>$d]);
        }
    }
}
