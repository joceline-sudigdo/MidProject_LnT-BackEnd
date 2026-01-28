<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'member_code' => 'MBR001',
                'name' => 'Janneke',
                'email' => 'janneke@gmail.com',
                'join_date' => now()
            ]
        ]);
    }
}
