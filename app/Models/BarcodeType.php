<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property-read Collection<int, ReagentInventory> $reagentInventories
 * @property-read int|null $reagent_inventories_count
 * @method static Builder<static>|BarcodeType newModelQuery()
 * @method static Builder<static>|BarcodeType newQuery()
 * @method static Builder<static>|BarcodeType query()
 * @method static Builder<static>|BarcodeType whereId($value)
 * @method static Builder<static>|BarcodeType whereName($value)
 * @mixin IdeHelperBarcodeType
 * @mixin Eloquent
 */
class BarcodeType extends Model
{
    //
    public $timestamps = false;

    public function reagentInventories(): HasMany
    {
        return $this->hasMany(ReagentInventory::class);
    }
}
