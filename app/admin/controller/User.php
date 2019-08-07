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
        $list = $admin->pageList();
        $page = $list->render();
        $this->assign('page', $page);
        $this->assign('list',$list);
        return $this->fetch();
    }


    public function getSelect() {
        $data = input('post.');
        // $map['user_name'] = array('like','%'.$data['user_name'].'%');
        $map = ['user_name', 'like', $data['user_name'].'%'];
        $admin = new Admin;
        $list = $admin->getAdmin($map);
        print_r($list);
    }
}