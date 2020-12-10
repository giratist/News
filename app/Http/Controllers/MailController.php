<?php


namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\KuEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller

{
public function index()
{
    $users= User::query()->get();
    foreach ($users as $user)
    {
        $maillebl = new KuEmail($user);
        Mail::to($user)->send($maillebl);
    }


}
}
