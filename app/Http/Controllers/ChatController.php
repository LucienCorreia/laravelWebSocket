<?php

namespace App\Http\Controllers;

use App\Events\Event;
use Illuminate\Http\Request;

class ChatController extends Controller {
    public function send(Request $request){
        return event(new Event($request->message));
    }
}
