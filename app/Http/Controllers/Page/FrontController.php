<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('page.front.index');
    }

    public function tripBromo()
    {
        return view('page.front.services.bromo');
    }

    public function tripIjen()
    {
        return view('page.front..services.ijen');

    }

    public function rental()
    {
        return view('');
    }

    public function about()
    {
        return view('page.front.about_us');

    }

    public function contact()
    {
        return view('page.front.contact_us');

    }

    public function gallery()
    {
        return view('page.front.gallery');

    }
}
