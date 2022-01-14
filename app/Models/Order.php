<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'status',
        'purchaseDate',
        'serviceDate',
        'installDate',
        'userID',
        'amount'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
