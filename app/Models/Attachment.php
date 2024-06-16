<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attachment extends OrmApiBaseModel
{
    protected $table = 'attachment';

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
            'Name' => 'nullable',
            'Description' => 'nullable',
            'ContentType' => 'nullable',
            'Path' => 'nullable',
            'RelativeName' => 'nullable',
            'RelativeID' => 'nullable',
            'CreatedOn' => 'required',
            'CreatedBy' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'Description',
        'ContentType',
        'Path',
        'RelativeName',
        'RelativeID',
        'CreatedOn',
        'CreatedBy'
    ];

    

    
}