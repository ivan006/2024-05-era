<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemAction extends OrmApiBaseModel
{
    protected $table = 'systemaction';

    public function relationships()
    {
        return [
            'useraccesses'
        ];
    }

    public function rules()
    {
        return [
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
        return $this->hasMany(UserAccess::class, 'SystemAction');
    }
}
