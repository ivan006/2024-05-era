<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $TransNo
 * @property string $Description
 * @property string $TransactionDate
 * @property string $CaptureDate
 * @property string $AccountCode
 * @property integer $Entity
 * @property integer $EntityProduct
 * @property float $Debit
 * @property float $Credit
 * @property string $Source
 * @property integer $Period
 * @property string $Reference
 * @property integer $Type
 * @property Systemcode $systemcode
 */
class Transaction extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['TransNo', 'Description', 'TransactionDate', 'CaptureDate', 'AccountCode', 'Entity', 'EntityProduct', 'Debit', 'Credit', 'Source', 'Period', 'Reference', 'Type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function systemcode()
    {
        return $this->belongsTo('App\Models\Systemcode', 'Type', 'Id');
    }
}
