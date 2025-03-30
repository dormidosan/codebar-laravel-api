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
 * @property int $municipality_id
 * @property string $name
 * @property-read \App\Models\Department $department
 * @property-read Collection<int, \App\Models\Laboratory> $laboratories
 * @property-read int|null $laboratories_count
 * @property-read \App\Models\Municipality $municipality
 * @method static Builder<static>|District newModelQuery()
 * @method static Builder<static>|District newQuery()
 * @method static Builder<static>|District query()
 * @method static Builder<static>|District whereDepartmentId($value)
 * @method static Builder<static>|District whereId($value)
 * @method static Builder<static>|District whereMunicipalityId($value)
 * @method static Builder<static>|District whereName($value)
 * @mixin Eloquent
 */
class District extends Model
{
    //
    public function laboratories(): HasMany
    {
        return $this->hasMany(Laboratory::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}
