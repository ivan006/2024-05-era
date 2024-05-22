<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Trait
 * @property string $Value
 * @property integer $Instance
 * @property mixed $ValueJson
 * @property integer $Object
 * @property integer $Entity
 */
class Objectvalue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'objectvalue';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Trait', 'Value', 'Instance', 'ValueJson', 'Object', 'Entity'];
}
