<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
		'category',
    ];

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}
