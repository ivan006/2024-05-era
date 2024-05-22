<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $SystemUser
 * @property string $Hash
 * @property string $Salt
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $FbId
 */
class Passwordhash extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'passwordhash';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'SystemUser';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['Hash', 'Salt', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'FbId'];
}
