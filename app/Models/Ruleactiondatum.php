<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Rule
 * @property string $TableName
 * @property string $ColumnName
 * @property string $ColumnType
 */
class Ruleactiondatum extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Rule', 'TableName', 'ColumnName', 'ColumnType'];
}
