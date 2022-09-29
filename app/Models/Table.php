<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;

class Table extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'unique_target',
    ];

    public static function render(string $html = ''): HtmlString
    {
        $html .= '<div class="row">';

        foreach(Table::all() as $table) {
            $html .= '
                <div class="col-auto">
                    <div id="dxy" class="btn btn-warning" style="width: 200px; height: 200px;">
                        ' . $table->unique_target . '
                    </div>
                </div>
            ';
        }

        $html .= '</div>';

        return new HtmlString($html);
    }
}
