<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable  = ['name', 'description'];
    protected $fillable = ['name', 'description', 'subcategory_id'];
    public function subcategory()
    {
        return $this->belongsTo(subCategory::class);
    }
    public function image()
    {
        return $this->morphMany(image::class, 'imageable');
    }
}
