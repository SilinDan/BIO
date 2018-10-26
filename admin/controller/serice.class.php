<?php  
//extends user子类继承db父类
class User extends Db{

public function GetSericeInfo(){
		$sql = "SELECT * FROM `serie` WHERE 1";  
		$ikum = $this->select($sql); 
		return $ikum;
}


	}
