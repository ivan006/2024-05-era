<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property boolean $Active
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $FbId
 * @property Useraccess[] $useraccesses
 */
class Userrole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userrole';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Active', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'FbId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function useraccesses()
    {
        return $this->hasMany('App\Models\Useraccess', 'UserRole', 'Id');
    }
}
