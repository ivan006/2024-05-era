<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $StreetNo
 * @property string $StreetName
 * @property string $Building
 * @property string $Postal
 * @property string $Suburb
 * @property string $City
 * @property string $Province
 * @property integer $Country
 * @property string $PostCode
 * @property integer $Type
 * @property integer $Person
 * @property string $MoveDate
 * @property boolean $Preferred
 * @property boolean $Dispatch
 * @property float $Latitude
 * @property float $Longitude
 * @property Systemcode $countrySystemcode
 * @property Systemcode $typeSystemcode
 */
class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['StreetNo', 'StreetName', 'Building', 'Postal', 'Suburb', 'City', 'Province', 'Country', 'PostCode', 'Type', 'Person', 'MoveDate', 'Preferred', 'Dispatch', 'Latitude', 'Longitude'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countrySystemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Country', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeSystemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Type', 'Id');
    }
}
