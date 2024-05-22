<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $ExternalNo
 * @property integer $Level
 * @property integer $Type
 * @property integer $Title
 * @property string $Name
 * @property string $Surname
 * @property string $Identity
 * @property string $BirthDate
 * @property integer $Gender
 * @property integer $Language
 * @property integer $Status
 * @property string $Note
 * @property string $Passport
 * @property boolean $HasPhoto
 * @property boolean $IsPaid
 * @property Entitygood[] $entitygoods
 * @property Entitygoodapproval[] $entitygoodapprovals
 * @property Entitygoodapproval[] $entitygoodapprovals
 * @property Entitygoodapproval[] $entitygoodapprovals
 * @property Good[] $goods
 * @property Servicerequest[] $servicerequests
 * @property Servicerequestreport[] $servicerequestreports
 * @property Systemcode[] $systemcodes
 */
class Entity extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'entity';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['ExternalNo', 'Level', 'Type', 'Title', 'Name', 'Surname', 'Identity', 'BirthDate', 'Gender', 'Language', 'Status', 'Note', 'Passport', 'HasPhoto', 'IsPaid'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoods()
    {
        return $this->hasMany('App\Models\Entitygood', 'Entity', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoodapprovals()
    {
        return $this->hasMany('App\Models\Entitygoodapproval', 'ApprovedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoodapprovals()
    {
        return $this->hasMany('App\Models\Entitygoodapproval', 'InvoiceApprovedBy', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entitygoodapprovals()
    {
        return $this->hasMany('App\Models\Entitygoodapproval', 'Entity', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
        return $this->hasMany('App\Models\Good', 'Sector', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequests()
    {
        return $this->hasMany('App\Models\Servicerequest', 'ServiceProvider', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicerequestreports()
    {
        return $this->hasMany('App\Models\Servicerequestreport', 'ServiceProvider', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function systemcodes()
    {
        return $this->hasMany('App\Models\Systemcode', 'Entity', 'Id');
    }
}
