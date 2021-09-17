<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Product extends Model
{
    use HasFactory;

    public $upload_distination = '/storage/images/';
    protected $appends = [
        'full_image_url',
    ];

    protected $fillable = [
        'title', 'image', 'description'
    ];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class)->withPivot('quantity', 'price');
    }

    public function getFullImageUrlAttribute($value)
    {
        return asset('/storage/images/' . $this->image);
    }

    public function setImageAttribute($value)
    {
        if (!$value instanceof UploadedFile) {
            $this->attributes['image'] = $value;
            return;
        }
        $image_name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 60);
        $image_name = $image_name . '.' . $value->getClientOriginalExtension(); // add the extention
        $value->move(public_path($this->upload_distination), $image_name);
        $this->attributes['image'] = $image_name;
    }
}
