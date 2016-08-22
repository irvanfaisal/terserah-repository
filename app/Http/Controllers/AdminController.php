<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Image;
use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('created_at', 'desc')->paginate(25);

        return view('admin.index',compact('places'));
    }

    public function show($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $images = Image::where('place_id', $place->id)->get();

        return view('places.show', compact('place', 'images'));
    }
}
