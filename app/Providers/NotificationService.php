<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class NotificationService extends ServiceProvider
{

    protected $sendProvider;

    public function __construct(MailerProvider $proveedorEnvio){
        $this->sendProvider = $proveedorEnvio;
    }

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

    public function notify(User $user,$message){

        $this->sendProvider->send($user->getEmail(),$message);
    }
}
