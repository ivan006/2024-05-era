<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityAudit extends OrmApiBaseModel
{
    protected $table = 'entityaudit';

    public function relationships()
    {
        return [
            'systemUserRel'
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

        public function systemUserRel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }


}
