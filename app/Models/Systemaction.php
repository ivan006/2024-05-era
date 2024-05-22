<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Module
 * @property string $Context
 * @property string $Action
 * @property string $Description
 * @property boolean $Available
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property Useraccess[] $useraccesses
 */
class Systemaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemaction';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Module', 'Context', 'Action', 'Description', 'Available', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function useraccesses()
    {
        return $this->hasMany('App\Models\Useraccess', 'SystemAction', 'Id');
    }
}
