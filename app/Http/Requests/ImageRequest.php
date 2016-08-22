<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
public function rules()
{
    // check if the array contains between 1 and 8 elements
    // you can remove max if you don't need it
    $rules = [ 'images' => 'required' ];

    $images = $this->file( 'images' );

    if ( !empty( $images ) )
    {
        foreach ( $images as $key => $image ) // add individual rules to each image
        {
            $rules[ sprintf( 'images.%d', $key ) ] = 'required|image|mimes:jpeg,jpg,bmp,png';
        }
    }

    return $rules;
}
}
