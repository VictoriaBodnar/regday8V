<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    public function catalog()
    {
        return view('catalog');
    }
    function changeTheme($color)
    {
        //return app('url')->asset($path.'/asset', $secure);
        config(['app.colortheme' => $color]);
        //localStorage.setItem('colortheme', $color);
        //$ee = Config::get('app.colortheme');
        Session::put('colortheme', $color);
        return view('welcome');
        //$ee = Config::get('app.name');
        //return app('url')->asset('/css/app1.css', $secure);
        //dd('/css/app1.css');
        //dd($ee);
    }
    public function InstructionShow()
    {
        $filePath = Config::get('app.instructionPath');
        //$filePath = Config::get('app.colortheme');
        //dd($filePath);
        return response()->file($filePath);
        //dd('/css/app.css');
        //return response()->file('/UserInstruction.pdf'); 
    }
}
