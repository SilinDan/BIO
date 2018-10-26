<?php  
//extends user子类继承db父类
class User extends Db{
public function sumUserId($page,$size)
	{
		$begin = ($page-1)*$size;
		$sql = "select * from user  order by id limit $begin,$size";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function sumUserSize($size)
	{
		$sql = "select * from user  order by id ";  
		$ikum = $this->select($sql); 
		$length  = sizeof($ikum);
		$pagesize = $length / $size ;
		return $pagesize;
	}
	public function findUserId($user_id){
		$sql = "select * from information where id='$user_id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function findId($id){
		$sql = "select * from `user` where id='$id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function informationDelete($id){
		// $sql = "select * from goods where goods_id ='$id'";  
		$sql =	"DELETE FROM `user` WHERE id='$id '";
		$length = $this->delete($sql);
		return $length;
	}
public function sumInfoId($id)
	{
		$sql = "select * from information  WHERE id='$id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	

}


