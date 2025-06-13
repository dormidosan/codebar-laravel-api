<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property-read Department $department
 * @property-read Collection<int, District> $districts
 * @property-read int|null $districts_count
 * @method static Builder<static>|Municipality newModelQuery()
 * @method static Builder<static>|Municipality newQuery()
 * @method static Builder<static>|Municipality query()
 * @method static Builder<static>|Municipality whereDepartmentId($value)
 * @method static Builder<static>|Municipality whereId($value)
 * @method static Builder<static>|Municipality whereName($value)
 * @mixin Eloquent
 */
class Municipality extends Model
{
    //
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
