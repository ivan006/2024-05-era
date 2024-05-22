<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Document
 * @property integer $Section
 * @property integer $Position
 * @property string $Title
 * @property string $Description
 * @property mixed $Comments
 * @property integer $Style
 * @property integer $CreatedBy
 * @property string $CreatedOn
 * @property Document $document
 */
class Documentdetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'documentdetail';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Document', 'Section', 'Position', 'Title', 'Description', 'Comments', 'Style', 'CreatedBy', 'CreatedOn'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'Document', 'Id');
    }
}
