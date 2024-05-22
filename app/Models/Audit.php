<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $TableName
 * @property string $CRUD
 * @property string $Data
 * @property string $ChangeDate
 * @property integer $Entity
 * @property integer $PageNo
 * @property integer $NoOfLines
 * @property string $CrudMessage
 */
class Audit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'audit';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['TableName', 'CRUD', 'Data', 'ChangeDate', 'Entity', 'PageNo', 'NoOfLines', 'CrudMessage'];
}
