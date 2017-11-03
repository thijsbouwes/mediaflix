<?php

namespace App\Http\Controllers;

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
}
