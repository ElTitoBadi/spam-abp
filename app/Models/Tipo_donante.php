<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_donante extends Model
{
    protected $table = 'tipos_donantes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function donante()
    {
        return $this->hasMany('App\Models\Donante', 'tipos_donante_id');
    }
}
