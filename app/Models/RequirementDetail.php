<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequirementDetail extends OrmApiBaseModel
{
    protected $table = 'requirementdetail';

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