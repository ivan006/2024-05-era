<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property integer $ServiceRequestReport
 * @property Servicerequestreport $servicerequestreport
 */
class Externalproducer extends Model
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
    protected $fillable = ['Name', 'ServiceRequestReport'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicerequestreport()
    {
        return $this->belongsTo('App\Models\Servicerequestreport', 'ServiceRequestReport', 'Id');
    }
}
