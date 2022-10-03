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
        'location',
    ];

    public static function render(string $html = ''): HtmlString
    {
        foreach(Table::all() as $table) {

            // onclick="location.href=\''. route('tables.show', [$table]) .'\'"

            $html .= '
                <div id="table-'. $table->id .'" class="btn btn-warning shadow-lg"
                style=
                "
                    width: 100px;
                    height: 100px;
                    transform: translate3d('. $table->getLocation('x') .'px, '. $table->getLocation('y') .'px, 0);
                ">
                    ' . $table->unique_target . '
                </div>
            ';
        }

        return new HtmlString($html);
    }

    public function getLocation(string $axis): int {
        $location = json_decode($this->location);

        return $location->$axis ?? 0;
    }
}
