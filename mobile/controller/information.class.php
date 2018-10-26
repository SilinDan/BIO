<?php  
//extends user子类继承db父类
class User extends Db{


	public function checkUserName($name){

		$sql = "select * from user where user_phone ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function infoShow($name){
	
		$sql = "select * from information where user_id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	public function informationAdd($id)
	{
		$res="用户信息添加失败！";
		$a = htmlspecialchars($_POST['user_name']);
		$b = htmlspecialchars($_POST['user_phone']);
		$c = htmlspecialchars($_POST['province1']);
		$d = htmlspecialchars($_POST['city1']);
		$e = htmlspecialchars($_POST['area1']);
		$f = htmlspecialchars($_POST['user_post']);
		$g = htmlspecialchars($_POST['detailed_add']);
		$l = htmlspecialchars($_POST['user_tel']);
		$h = $id;

		//echo $pwd;//加密的密码
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
		$n= time();

		$sql1 = "select * from information where user_name ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into information (user_name,user_phone,province3,city3,area3,user_post,detailed_add,user_tel,in_time,id) values('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}','{$l}','{$n}','{$h}')";

		// echo $sql;
		// if ($this->insert($sql)>0) {
		// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
		// }
		// else{
		// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
		// }
		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "用户信息添加成功！";
		}
		return $res;
	}
	public function infoAdd($id)
		{
			$res="用户信息添加失败！";
			$a = htmlspecialchars($_POST['name']);
			$b = htmlspecialchars($_POST['phone']);
			$c = htmlspecialchars($_POST['province3']);
			$d = htmlspecialchars($_POST['city3']);
			$e = htmlspecialchars($_POST['area3']);
			$f = htmlspecialchars($_POST['postal']);
			$g = htmlspecialchars($_POST['address']);
			$l = htmlspecialchars($_POST['telephone']);
			$h = $id;
	
			//echo $pwd;//加密的密码
			// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
			$n= time();
	
			$sql1 = "select * from information where user_name ='$a'";  
			$ikum = $this->select($sql1); 
			$length = sizeof($ikum);
	
			$sql = "insert into information (user_name,user_phone,province3,city3,area3,user_post,detailed_add,user_tel,in_time,id) values('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}','{$l}','{$n}','{$h}')";
	
			// echo $sql;
			// if ($this->insert($sql)>0) {
			// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
			// }
			// else{
			// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
			// }
			if ($this->insert($sql)>0 && $length <= 0) {
				$res = "用户信息添加成功！";
			}
			return $res;
		}
	//更改用户信息
	public function infoUpdate()
	{
		$res="用户信息修改失败！";
		$a = htmlspecialchars($_POST['name2']);
		$b = htmlspecialchars($_POST['phone2']);
		$c = htmlspecialchars($_POST['province2']);
		$d = htmlspecialchars($_POST['city2']);
		$e = htmlspecialchars($_POST['area2']);
		$f = htmlspecialchars($_POST['postal2']);
		$g = htmlspecialchars($_POST['address2']);
		$l = htmlspecialchars($_POST['telephone2']);
		$h = htmlspecialchars($_POST['user_id2']);

		

		$sql = "UPDATE  information SET user_name='$a',user_phone ='$b',province3='$c',city3='$d',area3='$e',user_post='$f',detailed_add='$g',user_tel='$l' where user_id = '$h'";
		
		if ($this->update($sql)>0) {
			$res = "用户信息修改成功！";
		}
		return $res;
	}
	//更改密码
	public function updatePwd($id)
	{
		$res="更改密码失败！";
		
		$a = htmlspecialchars($_POST['pwd']);

		

		$sql = "UPDATE `user` SET `pwd`='$a' where `user_phone` = '$id'";		
		if ($this->update($sql)>0) {
			$res = "更改密码成功！";
		}
		return $res;
	}
	//更改个人信息
		public function updateMess($id)
		{
			$res="更改信息失败！";
			
			$a = htmlspecialchars($_POST['user']);
			$b = htmlspecialchars($_POST['email']);
			$c = htmlspecialchars($_POST['phone']);
	
			
			$sql = "UPDATE `user` SET `name`='$a',`qqcom`='$b',`user_phone`='$c' where `id` = '$id'";			
			if ($this->update($sql)>0) {
				$res = "更改信息成功！";
			}
			return $res;
		}
		

}


