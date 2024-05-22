<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $SystemUser
 * @property string $DomainName
 * @property string $DomainAccount
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property Systemuser $systemuser
 */
class Domainuser extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'domainuser';

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
    protected $fillable = ['DomainName', 'DomainAccount', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SystemUser', 'Id');
    }
}
