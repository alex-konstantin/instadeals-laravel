<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Instadeals\Entities\Instadeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        dd('login');
//        $this->middleware('auth');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        dd('login');
//        return redirect('/instadeal/list');
    }
}