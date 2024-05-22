<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property mixed $Value
 */
class Systemconfiguration extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemconfiguration';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Value'];
}
