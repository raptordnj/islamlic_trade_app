<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\UserInPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->id();

        $userBalance = Transaction::where('user_id',  $userId)->sum('amount');
        $packageCount = UserInPackage::where('user_id',  $userId)->count();
        // dd( $userBalance);
        return view('home',compact('userBalance','packageCount'));
    }
}
