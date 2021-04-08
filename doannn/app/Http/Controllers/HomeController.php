<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$data=['title'=>'Bình Dương'];
    		return view('pages.home',$data);

    }
    public function login(){
    	
    	return view('admin_login');
    }
}
