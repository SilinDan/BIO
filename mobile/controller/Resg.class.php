<?php
	class Resg extends Db{

		//用户信息监测
		public function checkUserName($name){
			$sql = "select * from user where user_phone ='$name'";  
			$ikum = $this->select($sql); 
			return $ikum;
		}
		
		public function checkRegInfo(){
			
			$user_name=htmlspecialchars($_POST['user']);
			$db=new Db();
			$sql="select user_name from user where user_name='{$user_name}'";
			// $rows= $db->select($sql);
			if($this->select($sql)){
		// 		echo $str;

			echo "<script>alert('用户已存在！');window.history.go(-1);</script>";exit;
			}

			// echo"<pre>";
			// print_r($rows);
			// echo"</pre>";

		}

		//用户注册
		
		public function userReg(){ 
			$res="用户注册失败！";
			$user_phone = htmlspecialchars($_POST['user']);
			$pwd = htmlspecialchars($_POST['pwd']);
			$sex = htmlspecialchars($_POST['sex']);
			//echo $pwd;//加密的密码
			// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
			$time = time();
	
			$sql1 = "select * from user where user_phone ='$user_phone'";  
			$ikum = $this->select($sql1); 
			$length = sizeof($ikum);
	
			$sql = "insert into user(user_phone,pwd,sex,reg_time) values('{$user_phone}','{$pwd}','{$sex}','{$time}')";
	
			// echo $sql;
			// if ($this->insert($sql)>0) {
			// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
			// }
			// else{
			// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
			// }
			if ($this->insert($sql)>0 && $length <= 0) {
				$res = "用户注册成功！";
			}
			return $res;
			
		}
	}//类结束
?>