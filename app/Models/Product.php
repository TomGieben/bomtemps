<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasDate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;

class Product extends Model
{
    use HasFactory, HasDate, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'price',
    ];
}
