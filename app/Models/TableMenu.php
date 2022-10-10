<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableMenu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'table_menu';

    protected $fillable = [
        'menu_id',
        'table_id',
        'done',
    ];
}
