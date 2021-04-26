<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
      'creditor_payment_id','tanggal_payment'
    ];


    public function payment_details(){
        return $this->hasMany(Payment_detail::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'creditor_payment_id');
    }

}
