<?php
header("content-type:text/html;charset=utf8");
/**
 *入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define("MVC",realpath( './')); //当前框架所在的目录
define("CORE",MVC.'/core'); //框架的核心文件
define("APP",MVC.'/app'); //项目文件
define("MODULE","app");
define("DEBUG",true); //错误调试模式 默认的是开启
include "vendor/autoload.php";
//报错处理
if(DEBUG){
    $whoops = new \Whoops\Run();
    $errorTitle = "框架出错了";
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error',"On");
}else{
    ini_set("display_error","Off");
}
include CORE."/common/function.php";//加载函数类
include CORE."/imooc.php";
spl_autoload_register("\core\imooc::load");
\core\imooc::run();