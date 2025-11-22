<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $ip_address IP address of the user accessing the system
 * @property string $url URL accessed by the user
 * @property string $method HTTP method used for the request (GET, POST, etc.)
 * @property string $user_agent User agent of the user accessing the system
 * @property array<array-key, mixed>|null $payload Payload of the request
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserActionLog whereUserId($value)
 * @mixin \Eloquent
 */
class UserActionLog extends Model
{
    protected $fillable = ['user_id', 'ip_address', 'url', 'method', 'user_agent', 'payload'];

    protected $casts = [
        'payload' => 'array'
    ];

}
