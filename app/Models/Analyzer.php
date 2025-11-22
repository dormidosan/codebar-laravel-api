<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @method static Builder<static>|Analyzer newModelQuery()
 * @method static Builder<static>|Analyzer newQuery()
 * @method static Builder<static>|Analyzer query()
 * @method static Builder<static>|Analyzer whereArea($value)
 * @method static Builder<static>|Analyzer whereId($value)
 * @method static Builder<static>|Analyzer whereName($value)
 * @method static \Database\Factories\AnalyzerFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class Analyzer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['area', 'name'];

    public function reagents(): BelongsToMany
    {
        return $this->belongsToMany(Reagent::class, 'analyzer_reagent')->withTimestamps();
    }

}
