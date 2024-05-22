<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $ServiceRequest
 * @property integer $ReportFrequency
 * @property boolean $Active
 * @property Servicerequest $servicerequest
 * @property Systemcode $systemcode
 */
class Servicerequestfrequency extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'servicerequestfrequency';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ServiceRequest', 'ReportFrequency', 'Active'];

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
    public function systemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'ReportFrequency', 'Id');
    }
}
