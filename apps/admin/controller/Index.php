<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;

/**
 * 后台首页
 * Class Index
 * @package app\admin\controller
 */
class Index extends AdminBase
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $version = Db::query('SELECT VERSION() AS ver');
        $config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'mysql_version'   => $version[0]['ver'],
            'max_upload_size' => ini_get('upload_max_filesize')
        ];

        return $this->fetch('jqindex', ['config' => $config]);
    }
    
    public function menu()
    {

        $menu = [
            [ "id"=>1,  "url"=>"", "name"=>"内容管理","iconfont"=>"&#xe637;","sub"=>
                [
                    ["id"=>5,  "url"=>"", "name"=>"内容管理","iconfont"=>"&#xe637;","sub"=>
                        [
                            ["id"=>6,  "url"=>"article.html", "name"=>"文章列表","iconfont"=>"&#xe62a;"],
                            ["id"=>7,  "url"=>"article-cat.html", "name"=>"文章分类","iconfont"=>"&#xe635;"],
                            ["id"=>8,  "url"=>"tag.html", "name"=>"标签管理","iconfont"=>"&#xe632;"]
                        ]
                    ]
                ]
            ],
            [ "id"=>2,  "url"=>"", "name"=>"产品管理","iconfont"=>"&#xe631;","sub"=>[
                ["id"=>9,  "url"=>"product.html", "name"=>"产品列表","iconfont"=>"&#xe61a;","sub"=>[]],
                ["id"=>10,  "url"=>"brand.html", "name"=>"品牌管理","iconfont"=>"&#xe60d;","sub"=>[]],
                ["id"=>11,  "url"=>"product-cat.html", "name"=>"分类管理","iconfont"=>"&#xe610;","sub"=>[]]
            ]

            ],
            [ "id"=>3,  "url"=>"", "name"=>"会员管理","iconfont"=>"&#xe672;","sub"=>
                [
                    ["id"=>12,  "url"=>"", "name"=>"会员管理","iconfont"=>"&#xe672;","sub"=>
                        [
                            ["id"=>13,  "url"=>"member.html", "name"=>"会员列表","iconfont"=>"&#xe630;"],
                            ["id"=>14,  "url"=>"member-level.html", "name"=>"会员等级","iconfont"=>"&#xe60f;"],
                            ["id"=>15,  "url"=>"member-statistics.html", "name"=>"会员统计","iconfont"=>"&#xe74d;"]
                        ]
                    ]
                ]

            ],
            [ "id"=>4,  "url"=>"", "name"=>"系统管理","iconfont"=>"&#xe689;","sub"=>
                [
                    ["id"=>16,  "url"=>"", "name"=>"网站设置","iconfont"=>"&#xe646;","sub"=>
                        [
                            ["id"=>17,  "url"=>"config.html", "name"=>"系统设置","iconfont"=>"&#xe689;"],
                            ["id"=>18,  "url"=>"sys-log.html", "name"=>"系统日志","iconfont"=>"&#xe64a;"],
                            ["id"=>19,  "url"=>"menu.html", "name"=>"栏目管理","iconfont"=>"&#xe654;"],
                            ["id"=>20,  "url"=>"shielding.html", "name"=>"屏蔽词","iconfont"=>"&#xe654;"]
                        ]
                    ],
                    ["id"=>21,  "url"=>"", "name"=>"权限管理","iconfont"=>"&#xe646;","sub"=>
                        [
                            ["id"=>22,  "url"=>"admin-role.html", "name"=>"角色管理","iconfont"=>"&#xe689;"],
                            ["id"=>23,  "url"=>"admin-permission.html", "name"=>"权限设置","iconfont"=>"&#xe64a;"],
                            ["id"=>24,  "url"=>"admin.html", "name"=>"管理员","iconfont"=>"&#xe654;"]
                        ]
                    ]
                ]

            ]
        ];
        
        $msg['data']['list'] = $menu;
        $msg['status']=200;
        echo header("content-type:text/html; charset=utf-8");
        echo json_encode($msg);
    }
    
    public function welcome()
    {
        return $this->fetch('welcome');
    }
    
    public function userinfo()
    {
        return $this->fetch('userinfo');
    }
}