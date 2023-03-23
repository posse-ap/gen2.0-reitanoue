<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use SoftDeletes;

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
