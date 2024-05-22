<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Address
 * @property integer $Type
 * @property integer $Person
 * @property boolean $Preferred
 * @property Systemcode $systemcode
 */
class Email extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'email';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Address', 'Type', 'Person', 'Preferred'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Type', 'Id');
    }
}
