<?php
namespace app\admin\controller;
use app\admin\Base;
use think\Db;

class User extends Base{
	public function initialize() {
		parent::_initialize();
	}
	
    public function index() {
    	$list = Db::name('admin')->paginate(10,true);
    	 // echo Db::name('admin')->getLastSql();die;
    	 /*print_r($list);die;*/
    	$page = $list->render();
    	$this->assign('page', $page);
    	$this->assign('list',$list);
    	return $this->fetch();
    }
}