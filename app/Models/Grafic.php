<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grafic extends Model
{
    protected $table = 'graficos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

}
