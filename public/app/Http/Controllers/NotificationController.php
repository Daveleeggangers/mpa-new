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

    public function SendingNotification(){
        WebhookCall::create()
            ->url(env('WEBHOOK_LINK'))
            ->payload(['key' => 'value'])
            ->useSecret('sign-using-this-secret')
            ->throwExceptionOnFailure()
            ->dispatch();
        return view('dashboard');
        }



}
