<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Name' => 'nullable',
            'Branch' => 'nullable',
            'BranchName' => 'nullable',
            'Type' => 'nullable',
            'BankType' => 'nullable',
            'Account' => 'nullable',
            'Verified' => 'nullable',
            'Entity' => 'required'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'Branch',
        'BranchName',
        'Type',
        'BankType',
        'Account',
        'Verified',
        'Entity'
    ];

    

    
}