<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Rule
 * @property string $Process
 * @property string $Result
 * @property string $ResultNegative
 * @property string $ResultType
 * @property string $Description
 * @property string $ResultSystemCode
 * @property string $NegativeSystemCode
 */
class Ruleaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ruleaction';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Rule', 'Process', 'Result', 'ResultNegative', 'ResultType', 'Description', 'ResultSystemCode', 'NegativeSystemCode'];
}
