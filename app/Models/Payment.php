<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['paymentAmount','invoice_id','paymentMethod','note','customerName'];
    public function invoice(){
        return $this->hasMany(invoice::class);
    }

}
