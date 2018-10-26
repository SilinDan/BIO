<?php  
//extends user子类继承db父类
//

class Index extends Db{


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
			$sql1 = "select * from user  where pwd='$pwd' and user_phone='$user_phone'";
			$ikum1 = $this->select($sql1);
			if($ikum1 == false){   
				$res = "密码不正确！";
			}else{
				$res = "用户登录成功！";  
			}
		}
		return $res;
	}
	public function getUserName()
	{
	    session_start();
	    header('Content-type:text/html;charset=utf-8');
	    $user_phone = htmlspecialchars($_POST['logname']);
		$pwd = $_POST['logpwd'];   

	    if(isset($_SESSION['logname']) && $_SESSION['logname']===$user_phone){
	        header('location:../view/moblie-admin-bio.php');
	    }

	    if(isset($_POST['bio_denglu'])){
	        if(isset($_POST['logname']) && isset($_POST['logpwd']) && $_POST['logname']==$user_phone && $_POST['logpwd']==$pwd ){
	                $_SESSION['logname']=$_POST['logname'];
	                header('location:../view/text.php?url=../view/tes.php&info=登入成功！1秒后跳转到首面');
	            
	        }  else {
	            header('location:../view/text.php?url=../view/tes.php&info=对不起，用户名活密码填写错误！1秒后跳转到登入页面');
	        }
	    }
	}
}


