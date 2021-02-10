<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //importata
use Illuminate\Support\Facades\Mail; //importata
use Illuminate\Http\Request;

use App\Mail\TestMail; //importata

class HomeController extends Controller
{
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
        $mail = Auth::user() -> email; //per pescare l'utente collegato

        Mail::to($mail) -> send(new TestMail()); //per mandare mail all'utente

        return view('home');
    }
}
