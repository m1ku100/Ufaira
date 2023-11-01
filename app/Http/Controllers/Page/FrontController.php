<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Master\Tour;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('page.front.index');
    }

    public function trip($slug)
    {
        $data = Tour::query()->where('slug_tour',$slug)->first();

        if (empty($data)){
            abort('404');
        }


        return view('page.front.services.trip',[
            'data' => $data
        ]);

    }

    public function tripBromo()
    {
        return view('page.front.services.bromo');
    }

    public function tripIjen()
    {
        return view('page.front.services.ijen');

    }

    public function rental()
    {
        return view('page.front.rental');
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
