<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Migration extends Model
{
    protected $table = 'migrations';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'migration' => 'required',
            'batch' => 'required'
        ];
    }

    protected $fillable = [
        'migration',
        'batch'
    ];

    

    
}