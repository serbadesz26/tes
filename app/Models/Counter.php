<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Counter extends Model
{
    use HasFactory;

    protected $table ="counter";

    protected $fillable = [
        'id', 'slug', 'count'
    ];

}
