<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdatcong extends Model
{
    protected $table='chitietdatcong';
    protected $primaryKey = ['macb','makhudat','mamd'];
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['macb','makhudat','mamd','ngaycapnhat'];

}
