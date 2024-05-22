<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $TableID
 * @property string $TableName
 * @property string $Event
 * @property string $Date
 * @property integer $Instance
 */
class Entityevent extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entityevent';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['TableID', 'TableName', 'Event', 'Date', 'Instance'];
}
