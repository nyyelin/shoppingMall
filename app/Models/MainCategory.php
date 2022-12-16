<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Foundation\Eloquent\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory, HasUUID, SoftDeletes;
    protected $fillable = ['uuid', 'name'];
}
