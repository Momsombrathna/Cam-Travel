<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
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
       $ratings = $place->ratings;
   

       return view('uploadplace.show', compact('place', 'user'));
   }

}
