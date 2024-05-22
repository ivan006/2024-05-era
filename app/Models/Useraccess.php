<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $SystemUser
 * @property integer $UserRole
 * @property integer $SystemAction
 * @property integer $Entity
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $FbId
 * @property Systemaction $systemaction
 * @property Systemuser $systemuser
 * @property Userrole $userrole
 */
class Useraccess extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'useraccess';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['SystemUser', 'UserRole', 'SystemAction', 'Entity', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'FbId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemaction()
    {
        return $this->belongsTo('App\Models\Systemaction', 'SystemAction', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SystemUser', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userrole()
    {
        return $this->belongsTo('App\Models\Userrole', 'UserRole', 'Id');
    }
}
