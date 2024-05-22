<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $ServiceRequestReport
 * @property float $OpeningBalance
 * @property float $Refurbished
 * @property float $Recovered
 * @property float $Export
 * @property float $Energy
 * @property float $Landfill
 * @property float $LocalSecondaryProducts
 * @property Servicerequestreport[] $servicerequestreports
 * @property Servicerequestreport $servicerequestreport
 */
class Treatmentdetail extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ServiceRequestReport', 'OpeningBalance', 'Refurbished', 'Recovered', 'Export', 'Energy', 'Landfill', 'LocalSecondaryProducts'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestreports()
    {
        return $this->hasMany('App\Models\Servicerequestreport', 'TreatmentDetails', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicerequestreport()
    {
        return $this->belongsTo('App\Models\Servicerequestreport', 'ServiceRequestReport', 'Id');
    }
}
