<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Context
 * @property string $Field
 * @property string $Description
 * @property string $Value
 * @property string $Code
 * @property boolean $Active
 * @property boolean $UserGenerated
 * @property integer $ContextualId
 * @property string $CreatedOn
 * @property string $CreatedBy
 * @property string $ChangedOn
 * @property string $ChangedBy
 * @property integer $Entity
 * @property Address[] $addresses
 * @property Address[] $addresses
 * @property Contactnumber[] $contactnumbers
 * @property Email[] $emails
 * @property Servicerequestfrequency[] $servicerequestfrequencies
 * @property Entity $entity
 * @property Transaction[] $transactions
 * @property Userconfiguration[] $userconfigurations
 */
class Systemcode extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'systemcode';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Context', 'Field', 'Description', 'Value', 'Code', 'Active', 'UserGenerated', 'ContextualId', 'CreatedOn', 'CreatedBy', 'ChangedOn', 'ChangedBy', 'Entity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countryAddresses()
    {
        return $this->hasMany('App\Models\Address', 'Country', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function typeAddresses()
    {
        return $this->hasMany('App\Models\Address', 'Type', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactnumbers()
    {
        return $this->hasMany('App\Models\Contactnumber', 'Type', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'Type', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestfrequencies()
    {
        return $this->hasMany('App\Models\Servicerequestfrequency', 'ReportFrequency', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'Entity', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'Type', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userconfigurations()
    {
        return $this->hasMany('App\Models\Userconfiguration', 'Language', 'Id');
    }
}
