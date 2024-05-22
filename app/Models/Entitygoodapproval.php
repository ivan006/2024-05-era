<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $ApprovedBy
 * @property string $ApprovedOn
 * @property integer $InvoiceApprovedBy
 * @property string $InvoiceApprovedOn
 * @property integer $Entity
 * @property integer $Period
 * @property string $PurchaseOrder
 * @property string $InvoiceNo
 * @property boolean $UseAR
 * @property boolean $UseVAT
 * @property integer $Query
 * @property boolean $Status
 * @property Entitygood[] $entitygoods
 * @property Entity $entity
 * @property Entity $entity
 * @property Queryheader $queryheader
 * @property Entity $entity
 */
class Entitygoodapproval extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entitygoodapproval';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ApprovedBy', 'ApprovedOn', 'InvoiceApprovedBy', 'InvoiceApprovedOn', 'Entity', 'Period', 'PurchaseOrder', 'InvoiceNo', 'UseAR', 'UseVAT', 'Query', 'Status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoods()
    {
        return $this->hasMany('App\Models\Entitygood', 'Invoice', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'ApprovedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'InvoiceApprovedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function queryheader()
    {
        return $this->belongsTo('App\Models\Queryheader', 'Query', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'Entity', 'Id');
    }
}
