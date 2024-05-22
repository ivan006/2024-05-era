<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $SystemUser
 * @property integer $Language
 * @property integer $FbId
 * @property Systemcode $systemcode
 * @property Systemuser $systemuser
 */
class Userconfiguration extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userconfiguration';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'SystemUser';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['Language', 'FbId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Language', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SystemUser', 'Id');
    }
}
