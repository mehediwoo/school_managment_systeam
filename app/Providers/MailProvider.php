<?php

namespace App\Providers;

use App\Models\SMTP;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class MailProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {




    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $email=SMTP::first();

        if($email){
            $config=[
                'driver'=>$email->mailer,
                'host' => $email->host,
                'port' => $email->port,
                'encryption' => $email->encryption,
                'from'=>array('address'=> $email->sender,'name'=>$email->sender_name),
                'username' =>$email->username,
                'password' => $email->password,
                'sendmail' =>  '/usr/sbin/sendmail -bs -i',
                'pretend'=>false,
            ];
            Config::set('mail', $config);
        }
}
}
