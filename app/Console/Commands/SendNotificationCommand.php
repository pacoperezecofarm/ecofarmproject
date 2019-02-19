<?php

namespace App\Console\Commands;

use App\Providers\NotificationService;
use App\Providers\SesProvider;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendNotificationCommand {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('id');

        try {

            //emulamos
            //recuperamos el usuario, emulamos dicha recuperacion de datos
            //$user = User::findorFail($userId);
            $user = new User();
            $user->setEmail("test@test.com");
            $message = "un texto aleatorio";

            //instanciamos e invocamos
            $notificacionService = new NotificationService(new SesProvider());
            $result = $notificacionService->notify($user, $message);

            echo "UserId: ".$userId." email:".$user->getEmail().";message:".$message." result:".$result;

        }
        catch(ModelNotFoundException $e) {

            //por ejemplo
            dd($e);
        }

    }

}
