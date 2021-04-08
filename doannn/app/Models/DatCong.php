<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatCong extends Model
{
    protected $table='data_12062019 thuadat_phumy';
    protected $primaryKey = 'gid';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['gid','sohieutobando','sothututhua','dientich','mamd','macb','maphuong','hientrang','ngayquanly','diachi','tenkhudat','makhudat','geom'];
    public function cat(){
    		return $this->hasOne(CanBo::class,'macb','macb');
    }
    public function dog(){
    }
}
