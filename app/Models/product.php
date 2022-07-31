<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable  = ['name', 'description'];
    protected $fillable = ['name', 'description', 'subcategoryid','boxFilling','quantity', 'avaliabilty', 'barCode'];
    public function subcategory()
    {
        return $this->belongsTo(subCategory::class, 'subcategoryid', 'id');
    }
    public function image()
    {
        return $this->morphMany(image::class, 'imageable');
    }
    public function invoice()
    {
        return $this->belongsToMany(invoice::class);
    }
}
