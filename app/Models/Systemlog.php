<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $LogDate
 * @property string $LogLevel
 * @property string $Logger
 * @property string $SystemUser
 * @property string $CallSite
 * @property string $Message
 * @property string $Exception
 * @property string $StackTrace
 */
class Systemlog extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'systemlog';

    /**
     * @var array
     */
    protected $fillable = ['LogLevel', 'Logger', 'SystemUser', 'CallSite', 'Message', 'Exception', 'StackTrace'];
}
