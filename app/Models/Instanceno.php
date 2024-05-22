<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $ObjectName
 */
class Instanceno extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'instanceno';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ObjectName'];
}
