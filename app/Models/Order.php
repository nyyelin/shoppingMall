<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function order_detail()
    {
        return $this->belongsToMany('App\Model\Item')
                    ->withPivot('size_id', 'color_id', 'qty', 'status')
                    ->withTimestamps();
    }
}
