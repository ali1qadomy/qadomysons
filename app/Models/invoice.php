<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $fillable = ['custommer_id', 'salesperson'];
    public function custommer()
    {
        return  $this->belongsTo(custommer::class, 'custommer_id', 'id'); //,'id',
    }
    public function products()
    {
        return $this->belongsToMany(product::class);
    }
    public function payment()
    {
        return $this->belongsToMany(payment::class);
    }
}
