<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequestReport extends Model
{
    protected $table = 'servicerequestreport';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'ServiceRequest' => 'required',
            'ServiceProvider' => 'required',
            'CreatedBy' => 'nullable',
            'TreatmentDetails' => 'nullable',
            'CreatedOn' => 'nullable',
            'ReportDate' => 'nullable',
            'Approved' => 'required',
            'Rejected' => 'required'
        ];
    }

    protected $fillable = [
        'ServiceRequest',
        'ServiceProvider',
        'CreatedBy',
        'TreatmentDetails',
        'CreatedOn',
        'ReportDate',
        'Approved',
        'Rejected'
    ];

    

    
}