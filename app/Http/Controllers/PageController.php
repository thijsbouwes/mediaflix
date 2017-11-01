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

    public function users()
    {
        return view('page.users');
    }

    public function products()
    {
        return view('page.products');
    }

    public function events()
    {
        return view('page.events');
    }

    public function account()
    {
        return view('account.index');
    }

    public function admin()
    {
        return view('page.admin');
    }
}
