<?php

namespace App\Models;

use Database\Factories\LaboratoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $district_id
 * @property string $address
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\District $district
 * @property-read Collection<int, \App\Models\LaboratoryReagent> $laboratoryReagents
 * @property-read int|null $laboratory_reagents_count
 * @method static \Database\Factories\LaboratoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|Laboratory newModelQuery()
 * @method static Builder<static>|Laboratory newQuery()
 * @method static Builder<static>|Laboratory query()
 * @method static Builder<static>|Laboratory whereAddress($value)
 * @method static Builder<static>|Laboratory whereCreatedAt($value)
 * @method static Builder<static>|Laboratory whereDistrictId($value)
 * @method static Builder<static>|Laboratory whereId($value)
 * @method static Builder<static>|Laboratory whereName($value)
 * @method static Builder<static>|Laboratory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Laboratory extends Model
{
    /** @use HasFactory<LaboratoryFactory> */
    use HasFactory;

    protected $fillable = ['district_id', 'address', 'name'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function laboratoryReagents(): HasMany
    {
        return $this->hasMany(LaboratoryReagent::class);
    }
}
