<?php
namespace core\lib; //命名空间
use core\lib\conf;
class route{
    public $controller;
    public $action;
    public function __construct(){
        /**
         * 1.隐藏index.php
         * 2.获取到URL 参数部分
         * 3.返回对应的控制器和方法
         * */
        if(isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] !=  "/"){
            $path = $_SERVER['REDIRECT_URL'];
            $patharr = explode('/',trim($path,"/"));
            if(isset($patharr[0])){
                $this->controller = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else{
                $this->action = conf::get("ACTION","roude");
            }
            //把我们url中多余转化成GET参数
            $count = count($patharr) + 2;
            $i = 2;
            while($i<$count){
                if(isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                    $i = $i +2;
                }
            }
        }else{
            $this->controller = conf::get("CONTROLLER","roude");
            $this->action = conf::get("ACTION","roude");
        }
    }
}