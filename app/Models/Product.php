<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;
use App\Models\Menu;

class Product extends Model
{
    use HasFactory, HasDate, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'price',
    ];

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'product_menu', 'product_id', 'menu_id');
    }
}
