<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    protected $table = 'bank';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
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