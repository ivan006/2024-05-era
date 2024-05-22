<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Requirement
 * @property integer $RelativeID
 * @property string $Service
 * @property string $Category
 * @property string $Value
 * @property string $Comment
 * @property integer $Received
 * @property string $Name
 * @property string $NameOriginal
 * @property string $ContentType
 * @property string $Path
 * @property integer $ChangedBy
 * @property string $ChangedOn
 */
class Requirementdetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'requirementdetail';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Requirement', 'RelativeID', 'Service', 'Category', 'Value', 'Comment', 'Received', 'Name', 'NameOriginal', 'ContentType', 'Path', 'ChangedBy', 'ChangedOn'];
}
