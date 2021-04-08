<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dvct extends Model
{
    protected $table='donvicongtac';
    protected $primaryKey = 'madvct';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['madvct','maphuong','tenpb','tendvct'];
}
