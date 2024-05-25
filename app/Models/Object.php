<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Object extends Model
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
            'Name' => 'required',
            'Description' => 'required',
            'Parent' => 'nullable',
            'ChildType' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'Description',
        'Parent',
        'ChildType'
    ];

    

    
}