<?php
namespace app\admin\controller;
use app\admin\Base;
use think\Session;

class Index extends Base{

	public function initialize() {
		parent::_initialize();
	}

    public function index() {
    	$session = session('admin');
    	$this->assign('session',$session);
    	return $this->fetch();
    	//return view('index');
    }

    public function test() {
    	
    }
}
