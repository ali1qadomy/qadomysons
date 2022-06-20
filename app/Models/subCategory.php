<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'category_id'];



    public function category()
    {
        return $this->belongsTo(category::class);
    }
    
    public function product()
    {
        return $this->hasMany(product::class);
    }
}
