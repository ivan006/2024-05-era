<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Entity Name
 * @property integer $Entity Id
 * @property string $Operation
 * @property integer $SystemUser
 * @property mixed $Changes
 * @property string $Audit_TS
 * @property Systemuser $systemuser
 */
class Entityaudit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entityaudit';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Entity Name', 'Entity Id', 'Operation', 'SystemUser', 'Changes', 'Audit_TS'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SystemUser', 'Id');
    }
}
