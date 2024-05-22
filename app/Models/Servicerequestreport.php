<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $ServiceRequest
 * @property integer $ServiceProvider
 * @property integer $CreatedBy
 * @property integer $TreatmentDetails
 * @property string $CreatedOn
 * @property string $ReportDate
 * @property boolean $Approved
 * @property boolean $Rejected
 * @property Externalproducer[] $externalproducers
 * @property Servicerequest $servicerequest
 * @property Entity $entity
 * @property Systemuser $systemuser
 * @property Treatmentdetail $treatmentdetail
 * @property Treatmentdetail[] $treatmentdetails
 */
class Servicerequestreport extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'servicerequestreport';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ServiceRequest', 'ServiceProvider', 'CreatedBy', 'TreatmentDetails', 'CreatedOn', 'ReportDate', 'Approved', 'Rejected'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function externalproducers()
    {
        return $this->hasMany('App\Models\Externalproducer', 'ServiceRequestReport', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicerequest()
    {
        return $this->belongsTo('App\Models\Servicerequest', 'ServiceRequest', 'Id');
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treatmentdetail()
    {
        return $this->belongsTo('App\Models\Treatmentdetail', 'TreatmentDetails', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatmentdetails()
    {
        return $this->hasMany('App\Models\Treatmentdetail', 'ServiceRequestReport', 'Id');
    }
}
