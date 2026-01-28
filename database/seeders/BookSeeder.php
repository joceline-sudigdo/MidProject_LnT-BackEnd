<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'category_id' => 2,
                'title' => 'Laravel Dasar',
                'author' => 'Anonim',
                'stock' => 5
            ]
        ]);
    }
}
