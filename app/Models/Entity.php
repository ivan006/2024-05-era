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

    

    
}