<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property string $Description
 * @property integer $Object
 * @property string $Type
 * @property string $Level
 * @property boolean $IsRule
 * @property boolean $SpecialType
 * @property boolean $IsDisabled
 * @property boolean $IsHidden
 * @property string $SystemCodeContext
 * @property string $SystemCodeField
 */
class Objecttrait extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'objecttrait';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Description', 'Object', 'Type', 'Level', 'IsRule', 'SpecialType', 'IsDisabled', 'IsHidden', 'SystemCodeContext', 'SystemCodeField'];
}
