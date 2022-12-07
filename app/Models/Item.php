<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item_size()
    {
        return $this->belongsToMany('App\Model\Size')
            ->withPivot('color_id', 'qty')
            ->withTimestamps();
    }
}
