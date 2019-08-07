<?php
namespace app\admin\controller;
use app\admin\Base;
use think\Db;
use app\admin\model\Admin;
use app\admin\BaseModel;

class User extends Base{
	public function initialize() {
		parent::_initialize();
	}
	
    public function index() {
        $admin = new Admin;
        // $list = $this->allPage();
        $list = $admin->pageList();
        $page = $list->render();
        $this->assign('page', $page);
        $this->assign('list',$list);
        return $this->fetch();
        //print_r($list);die;

/*    	$list = Db::name('admin')->paginate(10,false,['query' => request()->param()]);
    	$page = $list->render();
    	$this->assign('page', $page);
    	$this->assign('list',$list);
    	return $this->fetch();*/
    }
}