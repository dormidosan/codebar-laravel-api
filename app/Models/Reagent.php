<?php

namespace App\Models;

use Database\Factories\ReagentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property int $reagent_type_id
 * @property string $code
 * @property string $name
 * @property string $volume
 * @property-read Collection<int, Analyzer> $analyzers
 * @property-read int|null $analyzers_count
 * @property-read Collection<int, ReagentInventory> $reagentInventory
 * @property-read int|null $reagent_inventory_count
 * @property-read ReagentType $reagentType
 * @method static \Database\Factories\ReagentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent whereReagentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reagent whereVolume($value)
 * @mixin Eloquent
 */
class Reagent extends Model
{
    /** @use HasFactory<ReagentFactory> */
    use HasFactory;

    public $timestamps = false;

    public function reagentType(): BelongsTo
    {
        return $this->belongsTo(ReagentType::class);
    }

    public function reagentInventory(): HasMany
    {
        return $this->hasMany(ReagentInventory::class);
    }

    public function analyzers(): BelongsToMany
    {
        return $this->belongsToMany(Analyzer::class, 'analyzer_reagent')->withTimestamps();
    }
}
