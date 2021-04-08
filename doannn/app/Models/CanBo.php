<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanBo extends Model
{
    protected $table='canbo';
    protected $primaryKey = 'macb';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['macb','madvct','ten','ho','cmnd','diachi','sdt','ngaysinh','gioitinh','email','taikhoan','matkhau','quyentruycap'];
}
