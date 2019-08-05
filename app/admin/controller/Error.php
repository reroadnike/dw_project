<?php
/*
Aothor:LZP
Time:2019-8-1
 */
namespace app\admin\controller;
use app\admin\Base;

class Error extends Base {
	public function initialize() {
		parent::_initialize();
	}

	public function _empty() {
		return view('error/404');
	}


}