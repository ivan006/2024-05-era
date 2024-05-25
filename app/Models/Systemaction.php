<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemaction extends Model
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
            'Module' => 'required',
            'Context' => 'required',
            'Action' => 'required',
            'Description' => 'nullable',
            'Available' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Module',
        'Context',
        'Action',
        'Description',
        'Available',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy'
    ];

    

        public function useraccesses(): HasMany
    {
        return $this->hasMany(Useraccess::class);
    }
}