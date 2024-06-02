<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    protected $table = 'document';

    public function relationships()
    {
        return [
            'documentdetails'
        ];
    }

    public function rules()
    {
        return [
            'RelativeName' => 'nullable',
            'RelativeID' => 'nullable',
            'Comment' => 'nullable',
            'Title' => 'nullable',
            'CreatedBy' => 'nullable',
            'CreatedOn' => 'nullable',
            'Access' => 'nullable'
        ];
    }

    protected $fillable = [
        'RelativeName',
        'RelativeID',
        'Comment',
        'Title',
        'CreatedBy',
        'CreatedOn',
        'Access'
    ];

    

        public function documentdetails(): HasMany
    {
        return $this->hasMany(Documentdetail::class, 'Document');
    }
}