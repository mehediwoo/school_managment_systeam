<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaSet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meta=[
            [
                'meta_title'=>'meta title',
                'meta_description'=>'meta description',
                'meta_keywords'=>'meta Keywords',
            ],

        ];
        \App\Models\MetaSet::insert($meta);
    }
}
