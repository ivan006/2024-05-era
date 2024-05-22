<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $textData
 */
class Dummy extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dummy';

    /**
     * @var array
     */
    protected $fillable = ['textData'];
}
