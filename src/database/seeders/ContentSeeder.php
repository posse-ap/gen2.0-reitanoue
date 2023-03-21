<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contents')->insert(
            [
                ['content' => 'N予備校',
                'color' => '#0445ec',
                ],
                ['content' => 'POSSE課題',
                'color' => '#0f70bd',
                ],
                ['content' => 'ドットインストール',
                'color' => '#20bdde',
                ],
            ]
        );
    }
}
