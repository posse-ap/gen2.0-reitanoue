<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
