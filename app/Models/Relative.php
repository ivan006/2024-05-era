<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Entity
 * @property integer $Relative
 * @property integer $Relationship
 * @property integer $Adopted
 * @property integer $Student
 * @property integer $Disabled
 * @property integer $TraditionalMarriage
 */
class Relative extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'relative';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Entity', 'Relative', 'Relationship', 'Adopted', 'Student', 'Disabled', 'TraditionalMarriage'];
}
