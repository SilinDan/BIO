<?php  
//extends user子类继承db父类
class User extends Db{


	public function checkAdminName($name){

		$sql = "select * from administrator where admin_name ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkAdminQQ($name){

		$sql = "select * from administrator where admin_qq ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkOrdernum($name){

		$sql = "select * from `order` where order_num ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	public function sumAdminId($page,$size)
	{
		$begin = ($page-1)*$size;
		$sql = "select * from administrator  order by admin_id limit $begin,$size";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function sumOrderId($page,$size)
	{
		$begin = ($page-1)*$size;
		$sql = "select * from `order`  order by order_id limit $begin,$size";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function sumOrderSize($size)
	{
		$sql = "select * from `order`  order by order_id ";  
		$ikum = $this->select($sql); 
		$length  = sizeof($ikum);
		$pagesize = $length / $size ;
		return $pagesize;
	}
	public function sumAdminSize($size)
	{
		$sql = "select * from administrator  order by admin_id ";  
		$ikum = $this->select($sql); 
		$length  = sizeof($ikum);
		$pagesize = $length / $size ;
		return $pagesize;
	}
	public function findAdminId($name){
		$sql = "select * from administrator where admin_id='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function findId($name){
		$sql = "select * from `user` where id='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function findUserId($user_id){
		$sql = "select * from information where user_id='$user_id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function findInfoId($id){
		$sql = "select * from information where id='$id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	//用户注册
	public function adminAdd()
	{
		$res="管理员添加失败！";
		$name = htmlspecialchars($_POST['ad_name']);
		$pwd = htmlspecialchars($_POST['ad_pwd']);
		$qq = htmlspecialchars($_POST['ad_qq']);
		$type = htmlspecialchars($_POST['admin_type']);

		//echo $pwd;//加密的密码
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
		$time = time();

		$sql1 = "select * from administrator where admin_name ='$name'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into administrator(admin_name,admin_pwd,admin_qq,admin_reg_time,admin_type) values('{$name}','{$pwd}','{$qq}','{$time}','{$type}')";

		// echo $sql;
		// if ($this->insert($sql)>0) {
		// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
		// }
		// else{
		// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
		// }
		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "管理员添加成功！";
		}
		return $res;
	}
	public function adminDelete($id){
		// $sql = "select * from goods where goods_id ='$id'";  
		$sql =	"DELETE FROM `administrator` WHERE admin_id ='$id'";
		$length = $this->delete($sql);
		return $length;
	}

	public function orderAdd()
	{
		$res="订单添加失败！";
		$a = htmlspecialchars($_POST['order_num']);
		$b = htmlspecialchars($_POST['sum_price']);
		$c = htmlspecialchars($_POST['order_state']);
		$d = htmlspecialchars($_POST['order_name']);
		$e = htmlspecialchars($_POST['pay_state']);
		$f = htmlspecialchars($_POST['send_state']);
		$g = htmlspecialchars($_POST['pay_way']);
		$l = htmlspecialchars($_POST['send_way']);

		//echo $pwd;//加密的密码
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
		$n= time();
		// $a = date("YmdHis",$n);
		// $a += ;
		$sql1 = "select * from `order` where order_num ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into `order`(order_num,sum_price,order_state,pay_state,send_state,pay_way,send_way,order_time) values('{$a}','{$b}','{$c}','{$e}','{$f}','{$g}','{$l}','{$n}')";
		// echo $sql;
		// if ($this->insert($sql)>0) {
		// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
		// }
		// else{
		// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
		// }
		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "订单添加成功！";
		}
		return $res;
	}
		public function orderDelete($id){
		// $sql = "select * from goods where goods_id ='$id'";  
		$sql =	"DELETE FROM `order` WHERE order_id ='$id'";
		$length = $this->delete($sql);
		return $length;
	}
	public function orderAlter()
		{
			$res="订单修改失败！";
			$a = htmlspecialchars($_POST['order_num']);
			$b = htmlspecialchars($_POST['sum_price']);
			$c = htmlspecialchars($_POST['order_state']);
			$d = htmlspecialchars($_POST['order_name']);
			$e = htmlspecialchars($_POST['pay_state']);
			$f = htmlspecialchars($_POST['send_state']);
			$g = htmlspecialchars($_POST['pay_way']);
			$l = htmlspecialchars($_POST['send_way']);
			
			$sql = "UPDATE  `order` SET `order_num`='$a',`sum_price`='$b',`order_state`='$c',`pay_state`='$e',`send_state`='$f',`pay_way`='$g',`send_way`='$l' WHERE order_num =$a";
			// echo $sql;
			// if ($this->insert($sql)>0) {
			// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
			// }
			// else{
			// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
			// }
			if ($this->update($sql)>0) {
				$res = "订单修改成功！";
			}
			return $res;
		}
		public function GetOrderInfo($id){
			$sql = "select * from `order` where order_id ='$id'";
			$ikum = ($this->select($sql))[0];
			$tun =$ikum['tun'] = $this->select("select * from information where user_id = $ikum[user_id]")[0];
			$ikum['user'] = $this->select("select * from information where user_id = $tun[user_id]")[0];
			return $ikum;
		}


		
//模糊搜索商品名
		// public function searchName(){
		// 	$send_state = $_GET['send_state'];
		// 	$order_state = $_GET['order_state'];
		// 	$rows='';

		// 	//查找ID为空，则查找名字
		// 	if ($send_state == "") {
		// 		$sql="select * from order  where order_state like '%$order_state%'";
		// 	}

		// 	//查找名字为空，则查找ID
		// 	else if ($order_state == "") {
		// 		$sql="select * from order  where goods_id like '$goods_id' ";
		// 	}

		// 	//查找名字,ID
		// 	else{
		// 		$sql="select * from order  where goods_id like '$goods_id' and goods_name like '%$goods_name%'";
		// 	}
		// 	return $rows = $this->select($sql); 
		// }
	
public function searchName(){
			$send_state = $_GET['send_state'];
			$order_state = $_GET['order_state'];
			$rows='';

			//查找ID为空，则查找名字
			if ($send_state == "") {
				// $sql="SELECT * FROM `order` WHERE `order_state`like  '%$order_state%'";
				$sql = "SELECT *FROM `order` , `information`WHERE order.user_id = information.user_id AND `order_state` LIKE '$order_state'";
			}

			//查找名字为空，则查找ID
			else if ($order_state == "") {
				// $sql="SELECT * FROM `order` WHERE `send_state`like  '%$send_state%'";
				$sql = "SELECT *FROM `order` , `information`WHERE order.user_id = information.user_id AND `send_state` LIKE '$send_state'";
			}

			//查找名字,ID
			else{
				// $sql="select * from order  where order_state like '$order_state' and send_state like '%$send_state%'";
				// $sql = "SELECT * FROM `order` WHERE `order_state`like  '%$order_state%' and `send_state`like  '%$send_state%'";
				$sql = "SELECT *FROM `order` , `information`WHERE order.user_id = information.user_id AND `order_state` LIKE '$order_state'AND `send_state` LIKE '$send_state'";

			}
			return $rows = $this->select($sql); 
		}

	public function changepwd()
		{
			$res="修改密码失败！";
			$admin_name = htmlspecialchars($_POST['admin_name']);
			$admin_pwd = htmlspecialchars($_POST['admin_pwd']);
			$admin_newpwd = htmlspecialchars($_POST['admin_newpwd']);

		    $sql1 = "select * from `administrator` where admin_pwd='$admin_pwd'";
			$ikum1 = $this->select($sql1);
			if($ikum1 == false){   
				$res = "原密码不正确！";
			}else{
			
			   $sql = "UPDATE  administrator SET admin_pwd='{$admin_newpwd}'  WHERE admin_name ='{$admin_name}'";
			// echo $sql;
			// if ($this->insert($sql)>0) {
			// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
			// }
			// else{
			// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
			// }
			if ($this->update($sql)>0) {
				$res = "修改密码成功！";
			}
			
		}return $res;
	}

}