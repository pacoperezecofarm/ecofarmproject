<?php

namespace App\Http\Controllers;

use App\Providers\NotificationService;
use App\Providers\SmtpProvider;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class genericController extends Controller
{
    /**
     * SendNotification...
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotification(Request $request){

        try {

            //recuperamos el usuario, emulamos dicha recuperacion de datos
            //$user = User::findorFail($request->id);
            $user = new User();
            $user->setEmail("test@test.com");

            $notificationService = new NotificationService(new SmtpProvider());

            //seteamos un mensaje aleatorio
            $message="un texto aleatorio";

            //invocamos el método notify con los parámetros solicitados
            $result=$notificationService->notify($user,$message);

            //respuesta json
            return response()->json(['id' => $request->id, 'email' => $user->getEmail(),'message'=>$message,'result'=>$result]);

        }
        catch(ModelNotFoundException $e) {

            //por ejemplo
            dd($e);
        }
    }


}
