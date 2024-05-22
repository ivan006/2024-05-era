<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $HSCode
 * @property string $Description
 * @property integer $EU6
 * @property integer $EU10
 * @property string $UNU
 * @property float $AvgKg
 * @property integer $Category
 * @property integer $HazardSubstance
 * @property integer $Dimension
 * @property integer $Sector
 * @property Entitygood[] $entitygoods
 * @property Entity $entity
 */
class Good extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'good';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['HSCode', 'Description', 'EU6', 'EU10', 'UNU', 'AvgKg', 'Category', 'HazardSubstance', 'Dimension', 'Sector'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoods()
    {
        return $this->hasMany('App\Models\Entitygood', 'Good', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'Sector', 'Id');
    }
}
