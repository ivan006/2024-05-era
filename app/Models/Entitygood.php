<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Entity
 * @property integer $Good
 * @property integer $Units
 * @property float $AvgKg
 * @property float $AvgKgOld
 * @property float $AvgLifeSpan
 * @property float $TotalKg
 * @property float $Tariff
 * @property boolean $Selected
 * @property integer $Dimension
 * @property integer $WasteClass
 * @property integer $Period
 * @property integer $Invoice
 * @property Entity $entity
 * @property Entitygoodapproval $entitygoodapproval
 * @property Good $good
 */
class Entitygood extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entitygood';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Entity', 'Good', 'Units', 'AvgKg', 'AvgKgOld', 'AvgLifeSpan', 'TotalKg', 'Tariff', 'Selected', 'Dimension', 'WasteClass', 'Period', 'Invoice'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'Entity', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entitygoodapproval()
    {
        return $this->belongsTo('App\Models\Entitygoodapproval', 'Invoice', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function good()
    {
        return $this->belongsTo('App\Models\Good', 'Good', 'Id');
    }
}
