<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\Share;

class PlaceShowController extends Controller
{
    //
    public function index()
    {
        $places = Place::latest()->paginate(10);

        return view('place.index', compact('places'));
    }

    public function show(Place $place)
    {
        $user = $place->user;

        $share = new Share();
        $shareplacebtn = $share->page(
            url('https://camtravel.online/photo/10/show'),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->pinterest()
        ->reddit()
        ->telegram();


        return view('place.show', compact('place', 'user', 'shareplacebtn'));
    }

}
