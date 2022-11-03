<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('languages')->insert(
            [
                ['language' => 'HTML',
                'color' => '#0445ec',
                ],
                ['language' => 'CSS',
                'color' => '#0f70bd',
                ],
                ['language' => 'SQL',
                'color' => '#20bdde',
                ],
                ['language' => 'SHELL',
                'color' => '#3ccefe',
                ],
                ['language' => 'Javascript',
                'color' => '#b29ef3',
                ],
                ['language' => 'PHP',
                'color' => '#4a17ef',
                ],
                ['language' => 'Laravel',
                'color' => '#3005c0',
                ],
                ['language' => 'others',
                'color' => '#6c46eb',
                ],
            ]  
            );
    }
}
