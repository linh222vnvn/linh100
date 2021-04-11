<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdatcong extends Model
{
	protected $table='chitietdatcong';
	protected $primaryKey = ['id'];
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id','macb','makhudat','mamd','maphuong','ngaycapnhat','hientrang','ngayquanly','diachi','tenkhudat'];

	}
