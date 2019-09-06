<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailsController extends Controller
{
    public function sendMail($mail, $nombre, $template){
      try {
        $to_name = $nombre;
        $to_email = $mail;
        $data = array('name'=>"nombre", "body" => "A test mail");
        Mail::send('emails.'.$template, $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Bienvenido a Feriate');
        $message->from('feriateferias@gmail.com','Disfruta de las ferias');
        });
          } catch (Exception $e) {
              //report($e);

              return false;
          }
    }
}
