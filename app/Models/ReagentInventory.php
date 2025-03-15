<?php

namespace App\Models;

use Database\Factories\ReagentInventoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property int $reagent_id
 * @property string $codebar
 * @property string|null $image
 * @property string $lot
 * @property string $expiration_date
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Collection<int, LaboratoryReagent> $laboratoryReagents
 * @property-read int|null $laboratory_reagents_count
 * @property-read Reagent $reagent
 * @method static \Database\Factories\ReagentInventoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereCodebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereReagentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReagentInventory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ReagentInventory extends Model
{
    /** @use HasFactory<ReagentInventoryFactory> */
    use HasFactory;

    public $timestamps = false;

    public function reagent(): BelongsTo
    {
        return $this->belongsTo(Reagent::class);
    }

    public function laboratoryReagents(): HasMany
    {
        return $this->hasMany(LaboratoryReagent::class);
    }
}
