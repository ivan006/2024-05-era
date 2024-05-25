<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requirementdetail extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Requirement' => 'nullable',
            'RelativeID' => 'nullable',
            'Service' => 'nullable',
            'Category' => 'nullable',
            'Value' => 'nullable',
            'Comment' => 'nullable',
            'Received' => 'nullable',
            'Name' => 'nullable',
            'NameOriginal' => 'nullable',
            'ContentType' => 'nullable',
            'Path' => 'nullable',
            'ChangedBy' => 'nullable',
            'ChangedOn' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Requirement',
        'RelativeID',
        'Service',
        'Category',
        'Value',
        'Comment',
        'Received',
        'Name',
        'NameOriginal',
        'ContentType',
        'Path',
        'ChangedBy',
        'ChangedOn'
    ];

    

    
}