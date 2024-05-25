<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends Model
{
    public function relationships()
    {
        return [
            'entitygoods',
            'entitygoodapprovals',
            'entitygoodapprovals',
            'entitygoodapprovals',
            'goods',
            'servicerequests',
            'servicerequestreports',
            'systemcodes'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
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
        'Id',
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

    

        public function entitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class);
    }

        public function entitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function entitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function entitygoodapprovals(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class);
    }

        public function goods(): HasMany
    {
        return $this->hasMany(Good::class);
    }

        public function servicerequests(): HasMany
    {
        return $this->hasMany(Servicerequest::class);
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }

        public function systemcodes(): HasMany
    {
        return $this->hasMany(Systemcode::class);
    }
}