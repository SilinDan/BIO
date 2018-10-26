<?php  
//extends user子类继承db父类
class Shop extends Db{


	public function checkUserName($name){

		$sql = "select * from user where user_phone ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	public function checkShop($name){
	
		$sql = "select * from shop where id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkGood($name){
	
		$sql = "select * from goods where goods_id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkOrder($name){
	
		$sql = "select * from `order` where id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkOrderNum($name){
	
		$sql = "select * from `order` where order_num ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkOrderDetail($name){
	
		$sql = "select * from `order_detail` where order_num ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkInformation($name){
	
		$sql = "select * from information where id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkInfoUserId($name){
		
		$sql = "select * from information where user_id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	

}


