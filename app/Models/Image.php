<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['article_id', 'image'];

    protected $appends = ['image_url'];


    //Mutators
    public function getImageUrlAttribute() {
        return asset('images/' . $this->image);
    }
}
