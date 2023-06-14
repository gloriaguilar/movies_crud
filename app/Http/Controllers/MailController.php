<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function newUser($user)
    {
        $mailData = [
            'title' => 'Welcome to Movies CRUD: '.$user->name,
            'body' => 'This is a message for your new register',
            'advice' => 'With great power comes great responsibility',
            'description'=> 'Have fun and enjoy of this CRUD'
        ];
         
        Mail::to($user->email)->send(new SendMail($mailData,true));
    }

    public function newMovie($movie)
    {
        $mailData = Movie::with(['category','platform'])->where('id', '=',$movie->id)->first();
        Mail::to($this->getUserEmail())->send(new SendMail($mailData,false));
    }

    private function getUserEmail(){
        if(Session()->has('loginID')){
            $idUser = Session::get('loginID');
            $mail   = User::where('id', '=',$idUser)->first();
            return $mail->email;
        }
     
    }
}