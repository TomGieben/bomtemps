<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Reservation;
use App\Models\TableMenu;

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

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'table_menu', 'table_id', 'menu_id')->withPivot('done', 'done');
    }
}
