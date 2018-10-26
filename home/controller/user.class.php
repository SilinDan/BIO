<?php  
//extends user子类继承db父类
class User extends Db{


	public function checkUserName($name){

		$sql = "select * from user where user_phone ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	//用户信息检测
	public function checkRegInfo()
	{
		if (strlen($_POST['user_phone'])<1) {
			//window.history.go(-1); 往回跳转
			//echo "<script>alert('请输入用户名！');window.location.href='../view/resg.v.html';</script>";
			return "请输入用户名！";
			exit;
		}
		if (strlen($_POST['pwd'])<1) {
			// echo "请输入密码！";
			return "请输入密码！";
			exit;
		}
	}

	//用户注册
	public function userReg()
	{
		$res="用户注册失败！";
		$user_phone = htmlspecialchars($_POST['user_phone']);
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

	public function checkLoginInfo()
	{
		if (strlen($_POST['logname'])<1) {
			return "请输入用户名！";
			exit;
		}
		if (strlen($_POST['logpwd'])<1) {
			return "请输入密码！";
			exit;
		}
	}

	public function loginReg()
	{
		$user_phone = htmlspecialchars($_POST['logname']);
		// $pwd = md5(htmlspecialchars($_POST['logpwd']));
		$pwd = $_POST['logpwd'];
		// echo $pwd;//加密的密码
		// echo '<br>';
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
		$time = time();

		$sql = "select * from user  where user_phone='$user_phone'";  //只要改这样就可以了
		// 
		// echo $sql;
		// echo $sql1;
		// echo '<br>';
		// $ikum1 = $this->select($sql1);
		$ikum = $this->select($sql);
		// if($ikum1 == false){
		// 	$res = "密码不正确！";我想要密码不正确 ok，那要这样写
		// }
		if($ikum == false){
			$res = "用户不存在！";   //这里是因为用户名不存在应该是可以了
		}
		else{
			$sql1 = "select * from user  where pwd='$pwd'";
			$ikum1 = $this->select($sql1);
			if($ikum1 == false){   
				$res = "密码不正确！";
			}else{
				$res = "用户登录成功！";  
			}
		}
		return $res;
		// echo $res;
		// echo $sql;
		// if ($this->insert($sql)>0) {
		// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
		// }
		// else{
		// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
		// }
		


		// if ($this->select($sql)==1) {
		// 	$res = "用户登录成功！";
		// }
		// return $res;
	}
	public function userOut()
	{
		setcookie(session_name(),'',time()-1,'/');
		$_SESSION = array();
		session_destroy();
		return true;
	}
}


