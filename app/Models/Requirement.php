<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Service
 * @property string $Category
 * @property integer $Code
 * @property string $Name
 * @property integer $Required
 * @property string $Path
 * @property integer $Display
 * @property string $SystemCodeContext
 * @property string $SystemCodeField
 * @property integer $ValueType
 */
class Requirement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'requirement';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Service', 'Category', 'Code', 'Name', 'Required', 'Path', 'Display', 'SystemCodeContext', 'SystemCodeField', 'ValueType'];
}
