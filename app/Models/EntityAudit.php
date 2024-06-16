<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityAudit extends OrmApiBaseModel
{
    protected $table = 'entityaudit';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'system_user_rel'
        ];
    }

    public function rules()
    {
        return [
            'Entity Name' => 'required',
            'Entity Id' => 'required',
            'Operation' => 'required',
            'SystemUser' => 'nullable',
            'Changes' => 'nullable',
            'Audit_TS' => 'required'
        ];
    }

    protected $fillable = [
        'Entity Name',
        'Entity Id',
        'Operation',
        'SystemUser',
        'Changes',
        'Audit_TS'
    ];

        public function system_user_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

    
}