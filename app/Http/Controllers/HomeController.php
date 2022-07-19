<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{

    public function sendnotification(Request $request)
    {
        $user = User::where('genre', '1')->get();
        //$user = DB::table('users')->where('genre', '=', 1)->get();


        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->acttext,

            'actionurl' => $request->url,

            'lastline' => $request->lastline,

            /*'genre' => $request->genre,*/
        ];

        Notification::send($user, new SendEmailNotification($details));

        dd('Sent');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
