<?php
namespace app\controller;
use core\lib\model;

class indexController extends \core\imooc{
    public function index(){
        $data = "Hello Word";
        $this->assign("data",$data);
        $this->display("index.html");
    }
    public function test(){
        $res = "sssfsdfsdfsa";
        $this->assign("data",$res);
        $this->display("test.html");
    }
}