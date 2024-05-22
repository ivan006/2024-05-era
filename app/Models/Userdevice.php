<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $SystemUser
 * @property string $DeviceKey
 * @property string $Name
 * @property string $LastUsed
 * @property integer $FbId
 * @property Systemuser $systemuser
 */
class Userdevice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userdevice';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'LastUsed', 'FbId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SystemUser', 'Id');
    }
}
