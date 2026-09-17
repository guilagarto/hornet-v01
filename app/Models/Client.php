<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Libera a gravação em massa de todos os campos validados
    protected $guarded = [];
}
