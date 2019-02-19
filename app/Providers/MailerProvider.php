<?php
/**
 * Created by PhpStorm.
 * User: kueva
 * Date: 18/02/2019
 * Time: 22:40
 */

namespace App\Providers;

interface MailerProvider
{

    /**
     * Método send
     * @param $email
     * @param $message
     * @return mixed
     */
    public function send($email,$message);

}