<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Relative extends Model
{
    protected $table = 'relative';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Entity' => 'nullable',
            'Relative' => 'nullable',
            'Relationship' => 'nullable',
            'Adopted' => 'nullable',
            'Student' => 'nullable',
            'Disabled' => 'nullable',
            'TraditionalMarriage' => 'nullable'
        ];
    }

    protected $fillable = [
        'Entity',
        'Relative',
        'Relationship',
        'Adopted',
        'Student',
        'Disabled',
        'TraditionalMarriage'
    ];

    

    
}