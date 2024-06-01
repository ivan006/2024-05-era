<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entityaudit extends Model
{
    protected $table = 'entityaudit';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Entity Name' => 'required',
            'Entity Id' => 'required',
            'Operation' => 'required',
            'SystemUser' => 'nullable',
            'Changes' => 'nullable',
            'Audit_TS' => 'required'
        ];
    }

    protected $fillable = [
        'Entity Name',
        'Entity Id',
        'Operation',
        'SystemUser',
        'Changes',
        'Audit_TS'
    ];

    

    
}