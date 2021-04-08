<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phuong extends Model
{
    protected $table='data_12062019 hanhchinh_xa';
    protected $primaryKey = 'gid';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['gid','maphuongxa','madvct','mahuyentp','tenxa','geom'];
}
