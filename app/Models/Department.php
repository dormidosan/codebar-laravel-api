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
 * @property string $code
 * @property string $name
 * @property-read Collection<int, District> $districts
 * @property-read int|null $districts_count
 * @property-read Collection<int, Municipality> $municipalities
 * @property-read int|null $municipalities_count
 * @method static Builder<static>|Department newModelQuery()
 * @method static Builder<static>|Department newQuery()
 * @method static Builder<static>|Department query()
 * @method static Builder<static>|Department whereCode($value)
 * @method static Builder<static>|Department whereId($value)
 * @method static Builder<static>|Department whereName($value)
 * @mixin IdeHelperDepartment
 * @mixin Eloquent
 */
class Department extends Model
{
    //
    public function municipalities(): HasMany
    {
        return $this->hasMany(Municipality::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
