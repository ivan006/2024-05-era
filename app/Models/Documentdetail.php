<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Documentdetail extends Model
{
    public function relationships()
    {
        return [
            'document'
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

        public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'Document');
    }

    
}