<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Entity
 * @property integer $EntityProduct
 * @property string $Contact
 * @property string $Description
 * @property integer $Status
 */
class Crm extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'crm';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Entity', 'EntityProduct', 'Contact', 'Description', 'Status'];
}
