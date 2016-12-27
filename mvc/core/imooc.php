<?php
namespace core; //命名空间
class imooc{
    public static $classMap = array(); //定义一个变量
    public $assign;
    static public function run() {
        \core\lib\log::init();
        $route = new \core\lib\route(); #控制器 方法 参数
        $controllerClass = $route->controller; //存放我们的控制器
        $action =$route->action; //存放我们的方法
        $controllerfile = APP.'/controller/'.$controllerClass."Controller.php";
        $cltrlClass = '\\'.MODULE.'\controller\\'.$controllerClass."Controller";
        if(is_file($controllerfile)){
            include $controllerfile;
            $controller = new $cltrlClass();
            $controller->$action();
            \core\lib\log::log("controller:".$controllerClass.'     '."action:".$action);
        }else{
            throw new \Exception("找不到控制器".$controllerClass);
        }
    }
    static  public function load($class){
        //自动加载类库
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = MVC .'/'. $class .".php";
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }
    public function display($file){
        $file = APP."/views/".$file;
        if(is_file($file)){
//            extract($this->assign);
//            include $file;
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP."/views");
            $twig = new \Twig_Environment($loader, array(
                'cache' => MVC."/log/twig",
            ));
            $template = $twig->load('index.html');
            $template->display($this->assign?$this->assign : "");
        }
    }
}