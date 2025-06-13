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
 * @property-read Collection<int, Reagent> $reagents
 * @property-read int|null $reagents_count
 * @method static Builder<static>|ReagentType newModelQuery()
 * @method static Builder<static>|ReagentType newQuery()
 * @method static Builder<static>|ReagentType query()
 * @method static Builder<static>|ReagentType whereId($value)
 * @method static Builder<static>|ReagentType whereName($value)
 * @mixin IdeHelperReagentType
 * @mixin Eloquent
 */
class ReagentType extends Model
{
    //
    public $timestamps = false;

    public function reagents(): HasMany
    {
        return $this->hasMany(Reagent::class);
    }
}
