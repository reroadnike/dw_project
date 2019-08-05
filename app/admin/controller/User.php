<?php
namespace app\admin\controller;
use app\admin\Base;

class User extends Base{
	public function initialize() {
		parent::_initialize();
	}
	
    public function index() {

    	return $this->fetch();
    }
}