<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 * @property string $Description
 * @property string $ContentType
 * @property string $Path
 * @property string $RelativeName
 * @property integer $RelativeID
 * @property string $CreatedOn
 * @property integer $CreatedBy
 */
class Attachment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'attachment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Description', 'ContentType', 'Path', 'RelativeName', 'RelativeID', 'CreatedOn', 'CreatedBy'];
}
