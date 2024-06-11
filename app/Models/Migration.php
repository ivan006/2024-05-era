<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Migration extends OrmApiBaseModel
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
