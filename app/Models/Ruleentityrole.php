<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $EntityRole
 * @property integer $Entity
 * @property integer $UserRole
 * @property integer $Rule
 * @property integer $Priority
 * @property integer $CRUD_Create
 * @property integer $CRUD_Read
 * @property integer $CRUD_Update
 * @property integer $CRUD_Delete
 */
class Ruleentityrole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ruleentityrole';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['EntityRole', 'Entity', 'UserRole', 'Rule', 'Priority', 'CRUD_Create', 'CRUD_Read', 'CRUD_Update', 'CRUD_Delete'];
}
