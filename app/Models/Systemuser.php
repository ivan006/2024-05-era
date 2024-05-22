<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Entity
 * @property string $Username
 * @property boolean $Active
 * @property string $LastSeen
 * @property integer $LoginCount
 * @property integer $FailedLoginAttempts
 * @property string $LockedSince
 * @property string $Secret
 * @property string $Email
 * @property string $Phone
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $FbId
 * @property Communication[] $communications
 * @property Domainuser $domainuser
 * @property Entityaudit[] $entityaudits
 * @property Servicerequest[] $servicerequests
 * @property Servicerequestreport[] $servicerequestreports
 * @property Useraccess[] $useraccesses
 * @property Userconfiguration $userconfiguration
 * @property Userdevice[] $userdevices
 */
class Systemuser extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemuser';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Entity', 'Username', 'Active', 'LastSeen', 'LoginCount', 'FailedLoginAttempts', 'LockedSince', 'Secret', 'Email', 'Phone', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'FbId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communications()
    {
        return $this->hasMany('App\Models\Communication', 'SentBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function domainuser()
    {
        return $this->hasOne('App\Models\Domainuser', 'SystemUser', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entityaudits()
    {
        return $this->hasMany('App\Models\Entityaudit', 'SystemUser', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequests()
    {
        return $this->hasMany('App\Models\Servicerequest', 'CreatedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestreports()
    {
        return $this->hasMany('App\Models\Servicerequestreport', 'CreatedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function useraccesses()
    {
        return $this->hasMany('App\Models\Useraccess', 'SystemUser', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userconfiguration()
    {
        return $this->hasOne('App\Models\Userconfiguration', 'SystemUser', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userdevices()
    {
        return $this->hasMany('App\Models\Userdevice', 'SystemUser', 'Id');
    }
}
