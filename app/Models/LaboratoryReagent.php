<?php

namespace App\Models;

use Database\Factories\LaboratoryReagentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $laboratory_id
 * @property int $reagent_inventory_id
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Laboratory $laboratory
 * @property-read ReagentInventory $reagentInventory
 * @property-read User $user
 * @method static \Database\Factories\LaboratoryReagentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereLaboratoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereReagentInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaboratoryReagent whereUserId($value)
 * @mixin Eloquent
 */
class LaboratoryReagent extends Model
{
    /** @use HasFactory<LaboratoryReagentFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['laboratory_id', 'reagent_inventory_id', 'user_id'];

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function reagentInventory(): BelongsTo
    {
        return $this->belongsTo(ReagentInventory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
