<?php
/*
Author:LZP
time:2019-8-1
 */
namespace app\common\validate;
use think\Validate;

class AdminLogin extends Validate {
	protected $rule = [
		'user_name' => 'require|max:20',
		'password' => 'require|max:20'
	];
}