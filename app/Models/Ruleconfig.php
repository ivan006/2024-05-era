<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Rule
 * @property string $TableName
 * @property string $ColumnName
 * @property string $ColumnType
 * @property string $Operand
 * @property string $Value
 * @property string $Description
 * @property string $SystemCodeValue
 */
class Ruleconfig extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ruleconfig';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Rule', 'TableName', 'ColumnName', 'ColumnType', 'Operand', 'Value', 'Description', 'SystemCodeValue'];
}
