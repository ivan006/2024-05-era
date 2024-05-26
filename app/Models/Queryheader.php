<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Queryheader extends Model
{
    protected $table = 'queryheader';

    public function relationships()
    {
        return [
            'entitygoodapprovalEntitygoodapprovals'
        ];
    }

    public function rules()
    {
        return [
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

    

        public function entitygoodapprovalEntitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }
}