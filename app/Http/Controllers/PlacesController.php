<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Image;
use App\Tag;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class PlacesController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
        ]]);
    }

    public function index()
    {
        $places = Place::all();

        $tags = ['western','20-30rb'];

        $tes = Place::with('tags')->whereHas('tags', function($q) use ($tags)
        {
            $q->whereIn('name', $tags);
        }, '=', count($tags))->get();

        return view('places.index', compact('places','tes'));
    }

    public function show($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $images = Image::where('place_id', $place->id)->get();

        return view('places.show', compact('place', 'images'));
    }
    
    public function store(PlaceRequest $request, ImageRequest $ImageRequest)
    {
        $place = Place::create($request->all());
        $files = $ImageRequest->file('images');
        foreach($files as $file) {
            /*            $destinationPath = 'uploads';
                        $filename = $file->getClientOriginalName();*/

            $key = time() . '-' . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();

            //upload to AWS S3
/*            $bucket = 'lootslog-storages';
            $s3 = \Storage::disk('s3');
            $Path = '/' . $key;
            $s3->put($Path, file_get_contents($file), 'public');
            $url = $s3->getDriver()->getAdapter()->getClient()->getObjectUrl($bucket, $key);*/

            //upload to local storage
            Storage::disk('uploads')->put($key, file_get_contents($file));
            $url = Storage::url($key);

            $image = new Image;
            $image->place_id = $place->id;
            $image->url =$url;
            $image->save();
        }




        return redirect('admin');


    }

    public function create()
    {
        return view('places.create');
    }

    public function edit($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $images = Image::where('place_id',$place->id)->get();

        return view('places.edit', compact('place','images'));
    }

    public function update($slug, placeRequest $request)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $place->update($request->all());
        $images = Image::where('place_id', $place->id)->get();

        return view('places.show', compact('place', 'images'));
    }

    public function destroy($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $place->delete();

        return redirect()->back();
    }
}
