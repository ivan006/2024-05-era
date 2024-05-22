<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Number
 * @property integer $Type
 * @property integer $Person
 * @property boolean $Preferred
 * @property Systemcode $systemcode
 */
class Contactnumber extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contactnumber';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Number', 'Type', 'Person', 'Preferred'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Type', 'Id');
    }
}
