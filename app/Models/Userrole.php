<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Userrole extends Model
{
    protected $table = 'userrole';

    public function relationships()
    {
        return [
            'useraccessUseraccesses'
        ];
    }

    public function rules()
    {
        return [
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
        'Name',
        'Active',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];

    

        public function useraccessUseraccesses(): HasMany
    {
        return $this->hasMany(Useraccess::class);
    }
}