<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends Model
{
    protected $table = 'entity';

    public function relationships()
    {
        return [
            'entitygoodEntitygoods',
            'entitygoodapprovalEntitygoodapprovals',
            'entitygoodapprovalEntitygoodapprovals1',
            'entitygoodapprovalEntitygoodapprovals2',
            'goodGoods',
            'servicerequestServicerequests',
            'servicerequestreportServicerequestreports',
            'systemcodeSystemcodes'
        ];
    }

    public function rules()
    {
        return [
            'ExternalNo' => 'nullable',
            'Level' => 'nullable',
            'Type' => 'nullable',
            'Title' => 'nullable',
            'Name' => 'nullable',
            'Surname' => 'nullable',
            'Identity' => 'nullable',
            'BirthDate' => 'nullable',
            'Gender' => 'nullable',
            'Language' => 'nullable',
            'Status' => 'nullable',
            'Note' => 'nullable',
            'Passport' => 'nullable',
            'HasPhoto' => 'nullable',
            'IsPaid' => 'nullable'
        ];
    }

    protected $fillable = [
        'ExternalNo',
        'Level',
        'Type',
        'Title',
        'Name',
        'Surname',
        'Identity',
        'BirthDate',
        'Gender',
        'Language',
        'Status',
        'Note',
        'Passport',
        'HasPhoto',
        'IsPaid'
    ];

    

        public function entitygoodEntitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class);
    }

        public function entitygoodapprovalEntitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function entitygoodapprovalEntitygoodapprovals1(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function entitygoodapprovalEntitygoodapprovals2(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function goodGoods(): HasMany
    {
        return $this->hasMany(Good::class);
    }

        public function servicerequestServicerequests(): HasMany
    {
        return $this->hasMany(Servicerequest::class);
    }

        public function servicerequestreportServicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }

        public function systemcodeSystemcodes(): HasMany
    {
        return $this->hasMany(Systemcode::class);
    }
}