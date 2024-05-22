<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property integer $Entity
 */
class Productprovider extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'productprovider';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Entity'];
}
