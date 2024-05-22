<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $ServiceRequestNo
 * @property integer $ServiceProvider
 * @property integer $CreatedBy
 * @property string $CreatedOn
 * @property string $FromDate
 * @property string $ToDate
 * @property string $Services
 * @property string $Locations
 * @property string $Deliverables
 * @property string $DeliveryDate
 * @property Entity $entity
 * @property Systemuser $systemuser
 * @property Servicerequestfrequency[] $servicerequestfrequencies
 * @property Servicerequestreport[] $servicerequestreports
 */
class Servicerequest extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'servicerequest';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ServiceRequestNo', 'ServiceProvider', 'CreatedBy', 'CreatedOn', 'FromDate', 'ToDate', 'Services', 'Locations', 'Deliverables', 'DeliveryDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'ServiceProvider', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'CreatedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestfrequencies()
    {
        return $this->hasMany('App\Models\Servicerequestfrequency', 'ServiceRequest', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestreports()
    {
        return $this->hasMany('App\Models\Servicerequestreport', 'ServiceRequest', 'Id');
    }
}
