<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 后台登录验证
 * Class Login
 * @package app\admin\validate
 */
class Login extends Validate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require',
        'captcha'   => 'require|captcha'
    ];

    protected $message = [
        'username.require' => '请输入用户名',
        'password.require' => '请输入密码',
        'captcha.require'   => '请输入验证码',
        'captcha.captcha'   => '验证码不正确'
    ];
}