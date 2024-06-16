<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentDetail extends OrmApiBaseModel
{
    protected $table = 'documentdetail';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'document_rel'
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

        public function document_rel(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'Document');
    }

    
}