<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $UserRole
 * @property integer $SystemAction
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $FbId
 * @property integer $Rule
 */
class Userroleaccess extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userroleaccess';

    /**
     * @var array
     */
    protected $fillable = ['CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'FbId', 'Rule'];
}
