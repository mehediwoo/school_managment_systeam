<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BackendSettings;
class BackendSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Backend=[
            [
             
                'institute_name'=>'Institute',

                'site_title'=>'Site Title',
                'sub_title'=>'Sub Title',
                'address'=>'Address',
                'phone'=>'Phone',
                'email'=>'Email',
                'starting_year'=>'2024',

                'facebook'=>'facebook',
                'footer'=>'footer',
                'twitter'=>'twitter',
                'linkedin'=>'linkedin',
                'instragram'=>'instragram',
            ],

        ];
          BackendSettings::insert($Backend);
    }
}
