<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('page.home');
    }

    public function dashboard()
    {
        return view('page.dashboard');
    }

    public function account()
    {
        return view('account.index');
    }
}
