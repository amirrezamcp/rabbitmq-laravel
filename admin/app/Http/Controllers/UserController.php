<?php

namespace App\Http\Controllers;

use App\Jobs\SendUserLoginEvent;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function random()
    {
        $user = User::inRandomOrder()->first();
        $photoUrl = "dasdasdadasdadsfgfhgfhfh";

        SendUserLoginEvent::dispatch($user->id, $photoUrl);

        return response([
            'id' => $user->id,
            'path'=> $photoUrl,
            'message' => 'Event dispatched to RabbitMQ with routing key: user.created'
        ]);
    }
}
