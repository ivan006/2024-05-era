<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $EntityA
 * @property integer $EntityB
 * @property integer $EntityARelationship
 * @property integer $EntityBRelationship
 * @property integer $EntityAStatus
 * @property integer $EntityBStatus
 * @property integer $EntityAQualifier
 * @property integer $EntityBQualifier
 * @property integer $EntityALevel
 * @property integer $EntityBLevel
 */
class Entityrelationship extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entityrelationship';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['EntityA', 'EntityB', 'EntityARelationship', 'EntityBRelationship', 'EntityAStatus', 'EntityBStatus', 'EntityAQualifier', 'EntityBQualifier', 'EntityALevel', 'EntityBLevel'];
}
