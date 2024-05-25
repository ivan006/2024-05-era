<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Userrole extends Model
{
    public function relationships()
    {
        return [
            'useraccesses'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Name' => 'required',
            'Active' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'Active',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];

    

        public function useraccesses(): HasMany
    {
        return $this->hasMany(Useraccess::class);
    }
}