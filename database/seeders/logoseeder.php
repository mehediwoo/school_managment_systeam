<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class logoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo=[
            [
                 'logo'=>'test.jpg',
                'favicon'=>'Icon',

            ],

        ];
        \App\Models\logoSet::insert($logo);
    }
}
