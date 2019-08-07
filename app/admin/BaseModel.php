<?php
/*
Author:lzp
Time:2019-8-7
 */
namespace app\admin;
use think\Model;
use think\Db;

class BaseModel extends Model {
	
	//公共分页方法
	public function allPage($map='',$page=1,$num=10,$field='*',$order='id desc',$group='') {
		$table = $this->tableName();
		if($group) {
			$list = db($table)->where($map)->field($field)->order($order)->group($group)->page($page)->paginate($num);
		} else {
			$list = db($table)->where($map)->field($field)->order($order)->page($page)->paginate($num);
		}
		// echo Db::name('admin')->getlastsql();die;
		return $list;
	}

	//获取表名
	public function tableName() {
	    $table     = lcfirst(substr(strrchr(get_called_class(), '\\'), 1));
	    $dstr      = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
	        return '_' . strtolower($matchs[0]);
	    }, $table);
	    $tableName = trim(preg_replace('/_{2,}/', '_', $dstr), '_');
	    return $tableName;
	}

}