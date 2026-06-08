<?php

namespace App\Http\Controllers;

use App\Jobs\TestRabbitMQJob;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function random()
    {
        $user = User::inRandomOrder()->first();
        $photoUrl = "dasdasdadasdadsfgfhgfhfh";
TestRabbitMQJob::dispatch($user, $photoUrl);
        return response([
            'id' => $user->id,
            'path'=> $photoUrl,
        ]);
    }
}
