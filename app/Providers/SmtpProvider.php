<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SmtpProvider extends ServiceProvider  implements MailerProvider
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
        //
    }

    /**
     * Método send ( Heredado interface)
     * @param $email
     * @param $message
     * @return mixed
     */
    public function send($email, $message)
    {
        return true;
    }
}
