<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 *
 * @property int $id
 * @property string $area
 * @property string $name
 * @property-read Collection<int, Reagent> $reagents
 * @property-read int|null $reagents_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Analyzer whereName($value)
 * @mixin Eloquent
 */
class Analyzer extends Model
{
    //
    protected $fillable = ['area', 'name'];

    public function reagents(): BelongsToMany
    {
        return $this->belongsToMany(Reagent::class, 'analyzer_reagent')->withTimestamps();
    }

}
