<?php

namespace App\Models;

use Database\Factories\AnalyzerReagentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $analyzer_id
 * @property int $reagent_id
 * @method static \Database\Factories\AnalyzerReagentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent whereAnalyzerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AnalyzerReagent whereReagentId($value)
 * @mixin Eloquent
 */
class AnalyzerReagent extends Model
{
    /** @use HasFactory<AnalyzerReagentFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['analyzer_id', 'reagent_id'];
    protected $table = 'analyzer_reagent';

}
