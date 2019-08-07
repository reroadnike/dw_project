<?php
/*
****Author：LZP
****time：2019-07-31
 */
namespace app\admin;
use think\Controller;
use think\Exception;
use think\Session;
use think\facade\Request;

class Base extends Controller {
	public function _initialize() {
		//判断是否登录
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			return $this->redirect('login/index');
		}
		$controller = request()->controller();
		$action = request()->action();
		$this->assign('controller',$controller);
		$this->assign('action',$action);
	}

	public function _empty(){     

	   $this->redirect('error/404');

	}


	//判断登录方法
	protected function isLogin() {
		//取出session
		$se_user = session('admin');
		if($se_user && $se_user['user_status']==1) {
			$this->assign('se_admin',$se_user);
			return true;
		}

		return false;
	}


}