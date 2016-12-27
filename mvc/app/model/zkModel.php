<?php
namespace app\model;
use core\lib\model;

class zkModel extends model{
    public $table = "zk";
    #添加一条
    public function addOne($data){
        $res = $this->insert($this->table,$data);
    }
    //查询所有
    public function listAll(){
        $res = $this->select($this->table,"*");
        return $res;

    }
    #查询单条
    public function listOne($id){
        $res = $this->get($this->table,"*",array(
            "id"=>$id,
        ));
        return $res;
    }
    #修改一条
    public function setOne($id,$data){
        return $this->update($this->table,$data,array(
            'id'=>$id,
        ));
    }
    #删除单条
    public function delOne($id){
        return $this->delete($this->table,array(
            'id'=>$id,
        ));
    }
}