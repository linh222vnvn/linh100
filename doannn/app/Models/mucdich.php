<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mucdich extends Model
{
    protected $table='mucdich';
    protected $primaryKey = 'mamd';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['mamd','tenmucdich','quydinh'];
}
