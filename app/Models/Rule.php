<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property string $Description
 * @property string $RuleType
 * @property integer $NextRule
 */
class Rule extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rule';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Description', 'RuleType', 'NextRule'];
}
