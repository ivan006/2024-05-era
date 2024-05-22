<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $Name
 * @property string $Branch
 * @property string $BranchName
 * @property integer $Type
 * @property integer $BankType
 * @property string $Account
 * @property integer $Verified
 * @property integer $Entity
 */
class Bank extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = ['Name', 'Branch', 'BranchName', 'Type', 'BankType', 'Account', 'Verified', 'Entity'];
}
