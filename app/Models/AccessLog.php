<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $ip_address IP address of the user accessing the system
 * @property string|null $url URL accessed by the user
 * @property string $method HTTP method used for the request (GET, POST, etc.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|AccessLog newModelQuery()
 * @method static Builder<static>|AccessLog newQuery()
 * @method static Builder<static>|AccessLog query()
 * @method static Builder<static>|AccessLog whereCreatedAt($value)
 * @method static Builder<static>|AccessLog whereId($value)
 * @method static Builder<static>|AccessLog whereIpAddress($value)
 * @method static Builder<static>|AccessLog whereMethod($value)
 * @method static Builder<static>|AccessLog whereUpdatedAt($value)
 * @method static Builder<static>|AccessLog whereUrl($value)
 * @mixin Eloquent
 */
class AccessLog extends Model
{
    protected $fillable = ['ip_address', 'url', 'method'];

}
