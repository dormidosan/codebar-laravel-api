<?php

namespace App\Models;

use Database\Factories\ReagentInventoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @property int $barcode_type_id
 * @property string $barcode
 * @property string|null $image
 * @property string $lot
 * @property string $expiration_date
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\BarcodeType $barcodeType
 * @property-read Collection<int, \App\Models\LaboratoryReagent> $laboratoryReagents
 * @property-read int|null $laboratory_reagents_count
 * @property-read \App\Models\Reagent $reagent
 * @method static \Database\Factories\ReagentInventoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|ReagentInventory newModelQuery()
 * @method static Builder<static>|ReagentInventory newQuery()
 * @method static Builder<static>|ReagentInventory query()
 * @method static Builder<static>|ReagentInventory whereBarcode($value)
 * @method static Builder<static>|ReagentInventory whereBarcodeTypeId($value)
 * @method static Builder<static>|ReagentInventory whereCreatedAt($value)
 * @method static Builder<static>|ReagentInventory whereExpirationDate($value)
 * @method static Builder<static>|ReagentInventory whereId($value)
 * @method static Builder<static>|ReagentInventory whereImage($value)
 * @method static Builder<static>|ReagentInventory whereLot($value)
 * @method static Builder<static>|ReagentInventory whereReagentId($value)
 * @method static Builder<static>|ReagentInventory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ReagentInventory extends Model
{
    /** @use HasFactory<ReagentInventoryFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [ 'reagent_id', 'barcode_type_id', 'barcode', 'image', 'lot', 'expiration_date', 'created_at', 'updated_at'];

    public function reagent(): BelongsTo
    {
        return $this->belongsTo(Reagent::class);
    }

    public function laboratoryReagents(): HasMany
    {
        return $this->hasMany(LaboratoryReagent::class);
    }

    public function barcodeType(): BelongsTo
    {
        return $this->belongsTo(BarcodeType::class);
    }
}
