<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['full_image_url'];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class);
    }

    public function getFullImageUrlAttribute($value)
    {
        return asset('/storage/images/' . $this->image);
    }
}
