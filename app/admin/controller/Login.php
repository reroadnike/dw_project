<?php
/*
*****Author: lzp
*****time: 2019-07-31
*/
namespace app\admin\controller;
use app\admin\Base;
use app\admin\model;
use think\Db;
use think\Session;
use think\facade\Request;

class Login  extends Base {
    public function initialize() {

        // parent::_initialize();
    }

    public function index() {
            $isLogin = $this->isLogin();
            if($isLogin) {
                return $this->redirect('index/index');
            } else {
                return $this->fetch('login/login');
            }

    }

    //登录验证方法
    public function login() {
        if(request()->isPost()) {
            // $data = input('post.');
            $data = Request::post();
            //验证post数据
            $info = Db::name('admin')->where('user_name',$data['user_name'])->find();

            if(!$info) {
                return array('status'=>2,'msg'=>'账号输入错误');
            }
            if(md5(md5($data['password']).$info['solt']) != $info['password']) {
                return array('status'=>3,'msg'=>'密码错误');
            }
            session('admin',array('user_id'=>$info['id'],'user_name'=>$info['user_name'],'user_status'=>$info['status']));
           // print_r(session('admin'));die;
            if(session('admin')) {
                return array('status'=>1,'msg'=>'登录成功');
            }
        } else {
            $this->error('请求不合法');
        }
    }

    //退出登录
    public function signOut() {
        session(null);
        $this->redirect('login/index');
    }

    //修改密码
    public function checkPass() {
        if(session('admin.user_id')) {
            if(request()->isPost()) {
                $data = input('post.password');
                $salt = mt_rand(000000,999999);
                $password = md5(md5($data).$salt);
                $user_id = session('admin.user_id');
                $info = Db::name('admin')->where('id',$user_id)->data(['password'=>$password,'solt'=>$salt])->update();
                if($info) {
                    session(null);
                    return array('status'=>1,'msg'=>'修改成功');
                } else {
                    return array('status'=>2,'msg'=>'修改失败');
                }
            }
            $se_user = session('admin');
            $this->assign('se_admin',$se_user);
            return $this->fetch();
        } else {
            $this->redirect('login/index');
        }
    }

}