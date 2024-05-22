<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $RelativeName
 * @property integer $RelativeID
 * @property string $Comment
 * @property string $Title
 * @property integer $CreatedBy
 * @property string $CreatedOn
 * @property mixed $Access
 * @property Documentdetail[] $documentdetails
 */
class Document extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'document';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['RelativeName', 'RelativeID', 'Comment', 'Title', 'CreatedBy', 'CreatedOn', 'Access'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentdetails()
    {
        return $this->hasMany('App\Models\Documentdetail', 'Document', 'Id');
    }
}
