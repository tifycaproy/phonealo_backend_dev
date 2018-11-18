<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
class telegramController extends Controller
{
   public function enviarmensaje(Request $request){
    //dd($text);    
    $text = $request->txtmensaje;
    Telegram::sendMessage([
     //'chat_id' => env('TELEGRAM_CHANNEL_ID','590443525')
     'chat_id' => env('TELEGRAM_CHANNEL_ID', '687968613'),
     //id grupo phonealo real'chat_id' => env('TELEGRAM_CHANNEL_ID','-277259846'),   
     'parse_mode' => 'HTML',
     'text' => $text
    ]);

     return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Message sent');
    }
}
