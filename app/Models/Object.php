<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property string $Description
 * @property integer $Parent
 * @property integer $ChildType
 */
class Object extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'object';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Description', 'Parent', 'ChildType'];
}
