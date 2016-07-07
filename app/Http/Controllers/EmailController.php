<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        try{
        	$title =$request->input('title');
        	$content = $request->input('content');
        	$subject ='Registro de usuario';
        	$to ='juan0094@gmail.com';

            Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use($subject,$to)
            {

                $message->from('registros@papusclub.com', 'Juan Ignacio Ferraro');
                $message->to($to);
    			$message->subject($subject);

    			//$message->sender($address, $name = null);
    			//$message->to($address, $name = null);
    			//$message->cc($address, $name = null);
    			//$message->bcc($address, $name = null);
    			//$message->replyTo($address, $name = null);

    			//$message->priority($level);
    			//$message->attach($pathToFile, array $options = []);            

            });

            return response()->json(['message' => 'Request completed']);     
        }catch (\Exception $e)
        {
            $error = 'EmailController';
            return view('errors.corrigeme', compact('error'));
        }  
    }
}
