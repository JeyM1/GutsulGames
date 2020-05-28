<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe() {
        if($email = request()->get('email')){
            try {
                Subscriber::create([
                    'email' => $email,
                ]);
                
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    // we have a duplicate entry problem
                    return redirect()->back()->with(['error_notify' => "Дана поштова скринька вже підписана на розсилку!"]);
                }
            }
            return redirect()->route('main')->with(['success_notify' => "Пошта '$email' успішно зареєстрована!"]);
        }
    }

    public function unsubscribe() {
        if($email = request()->get('email')){
            Subscriber::where('email', $email)->delete();
            return redirect()->route('main')->with(['success_notify' => "Пошта '$email' успішно видалена з наших записів!"]);
        }
    }
}
