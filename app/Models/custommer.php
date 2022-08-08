<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custommer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phoneNumber', 'address', 'Total remaining on it'];

    public function invoice()
    {
        return $this->hasMany(invoice::class,  'custommer_id','id'); //,'custommer_id','id'
    }
    public function payment(){
        return $this->hasMany(invoice::class);
    }
}
