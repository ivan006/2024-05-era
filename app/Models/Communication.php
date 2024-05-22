<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Type
 * @property string $Status
 * @property integer $SentBy
 * @property string $SentTo
 * @property string $SentOn
 * @property string $Content
 * @property string $RelativeName
 * @property integer $RelativeID
 * @property Systemuser $systemuser
 */
class Communication extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'communication';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Type', 'Status', 'SentBy', 'SentTo', 'SentOn', 'Content', 'RelativeName', 'RelativeID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemuser()
    {
        return $this->belongsTo('App\Models\Systemuser', 'SentBy', 'Id');
    }
}
