<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentDetail extends Model
{
    protected $table = 'documentdetail';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Document' => 'nullable',
            'Section' => 'nullable',
            'Position' => 'nullable',
            'Title' => 'nullable',
            'Description' => 'nullable',
            'Comments' => 'nullable',
            'Style' => 'nullable',
            'CreatedBy' => 'nullable',
            'CreatedOn' => 'nullable'
        ];
    }

    protected $fillable = [
        'Document',
        'Section',
        'Position',
        'Title',
        'Description',
        'Comments',
        'Style',
        'CreatedBy',
        'CreatedOn'
    ];

    

    
}