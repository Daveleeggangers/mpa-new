<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\WebhookServer\WebhookCall;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use app\Models\User;



class NotificationController extends Controller
{
    public function notificationButton(){


        return view('notificationPage');
    }

    public function TokenToDatabase(request $request){
        $id = auth()->user()->id;

        $user = User::find($id);


        $user->iftttToken = $request->iftttToken;

        $user->iftttTrigger = $request->iftttTrigger;


        $user->save();



        return view('dashboard');
    }


    public function SendingNotification(){
        $key = auth()->user()->iftttToken;
        $trigger = auth()->user()->iftttTrigger;


        WebhookCall::create()
            ->url('https://maker.ifttt.com/trigger/' . $trigger .'/with/key/' . $key)
            ->payload(['key' => 'value'])
            ->useSecret('sign-using-this-secret')
            ->throwExceptionOnFailure()
            ->dispatch();


        return view('dashboard');
        }



}
