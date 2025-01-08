<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentGateway extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $payment=[
            [
                'name'=>'name',
                'transactionFee'=>'0.0',
                'accountType'=>'accountType',
                'sandbox'=>'Active',
                'username'=>'username',
                'password'=>'password',
                'appKey'=>'appKey',
                'appSecret'=>'appSecret',
                'logo'=>'logo',
                'status'=>'Active',
            ],

        ];
        \App\Models\custompayment::insert($payment);

    }
}

