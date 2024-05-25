<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Queryheader extends Model
{
    public function relationships()
    {
        return [
            'entitygoodapprovals'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Subject' => 'nullable',
            'Status' => 'nullable',
            'Type' => 'nullable',
            'RelativeName' => 'nullable',
            'RelativeID' => 'nullable',
            'CreatedBy' => 'nullable',
            'CreatedOn' => 'required',
            'ClosedBy' => 'nullable',
            'ClosedOn' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Subject',
        'Status',
        'Type',
        'RelativeName',
        'RelativeID',
        'CreatedBy',
        'CreatedOn',
        'ClosedBy',
        'ClosedOn'
    ];

    

        public function entitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }
}