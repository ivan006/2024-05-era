<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $ParentQuery
 * @property string $AssignedTo
 * @property string $Description
 * @property integer $CreatedBy
 * @property string $CreatedOn
 * @property string $ClosedOn
 * @property integer $ClosedBy
 */
class Query extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'query';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ParentQuery', 'AssignedTo', 'Description', 'CreatedBy', 'CreatedOn', 'ClosedOn', 'ClosedBy'];
}
