<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Relative extends OrmApiBaseModel
{
    protected $table = 'relative';

    public $timestamps = false;

    protected $primaryKey = 'Id';

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