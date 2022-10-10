<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_menu';

    protected $fillable = [
        'menu_id',
        'product_id',
    ];
}
