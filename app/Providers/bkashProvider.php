<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\custompayment;

class bkashProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load the bKash configuration dynamically using the specified driver
        $this->loadBkashConfig();
    }

    protected function loadBkashConfig()
    {
        // Fetch the default driver from the configuration file
        $defaultDriver = config('bkash.default');

        // If the driver is set to 'database', load the settings from the database
        if ($defaultDriver === '') {
            $this->loadDatabaseConfig();
        }

        // Optionally, you can add logic for other drivers here (e.g., file, API)
    }

    protected function loadDatabaseConfig()
    {
        // Retrieve payment configuration for bKash from the database
        $paymentConfig = custompayment::first();

        if ($paymentConfig) {
            // Dynamically set the bKash configuration values
            Config::set('bkash.bkash_username', $paymentConfig->username);
            // Config::set('bkash.sandbox', $paymentConfig->sandbox);
            Config::set('bkash.bkash_password', $paymentConfig->password);
            Config::set('bkash.bkash_app_key', $paymentConfig->appKey);
            Config::set('bkash.bkash_app_secret', $paymentConfig->appSecret);

        }
    }
}
