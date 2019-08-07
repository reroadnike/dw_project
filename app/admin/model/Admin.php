<?php
/*
Author:lzp
Time:2019-8-7
 */
namespace app\admin\model;
use think\Db;
use think\Model;
use app\admin\BaseModel;

class Admin extends BaseModel {
	public function pageList() {
		// $map['status'] = 1;
		$list = $this->allPage($map='',$page=1,$num=10,$field='*',$order='id asc',$group='');
		return $list;
	}

	//查询管理员
	public function getAdmin($map='') {
		$table = $this->tableName();
		print_r($map);die;
		$data = db($table)->where($map)->all();
		echo Db::name('admin')->getlastsql();die;
		return $data;
	}
}