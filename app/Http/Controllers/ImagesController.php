<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Image;
use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function store($slug, ImageRequest $ImageRequest)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
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

        return redirect()->back();

    }

    public function destroy($slug, $id)
    {
        $image = Image::whereId($id)->firstOrFail();
        $image->delete();

        return redirect()->back();
    }
}
