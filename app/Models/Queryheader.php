<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Subject
 * @property integer $Status
 * @property integer $Type
 * @property string $RelativeName
 * @property integer $RelativeID
 * @property integer $CreatedBy
 * @property string $CreatedOn
 * @property integer $ClosedBy
 * @property string $ClosedOn
 * @property Entitygoodapproval[] $entitygoodapprovals
 */
class Queryheader extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'queryheader';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Subject', 'Status', 'Type', 'RelativeName', 'RelativeID', 'CreatedBy', 'CreatedOn', 'ClosedBy', 'ClosedOn'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoodapprovals()
    {
        return $this->hasMany('App\Models\Entitygoodapproval', 'Query', 'Id');
    }
}
