<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'user_id', 'price', 'receiver_name', 'address', 'phone', 'pymethod', 'status'
    ];
    
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    
}
