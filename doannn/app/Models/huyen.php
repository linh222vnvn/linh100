<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huyen extends Model
{
    protected $table='data_12062019 hanhchinh_huyen';
    protected $primaryKey = 'gid';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['gid','mahuyentp','tenhuyen','geom'];
}
