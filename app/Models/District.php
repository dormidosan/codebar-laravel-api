<?php

namespace App\Models;

use Eloquent;
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
 * @property-read Department $department
 * @property-read Collection<int, Laboratory> $laboratories
 * @property-read int|null $laboratories_count
 * @property-read Municipality $municipality
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereMunicipalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereName($value)
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
