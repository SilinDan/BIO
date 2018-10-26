<?php  
//extends user子类继承db父类
//

class Index extends Db{


	public function checkLoginInfo()
	{
		if (strlen($_POST['admin_name'])<1) {
			return "请输入用户名！";
			exit;
		}
		if (strlen($_POST['admin_pwd'])<1) {
			return "请输入密码！";
			exit;
		}
	}

		public function loginReg()
	{
		$admin_name = htmlspecialchars($_POST['admin_name']);
		// $pwd = md5(htmlspecialchars($_POST['logpwd']));
		$admin_pwd = $_POST['admin_pwd'];
		// echo $pwd;//加密的密码
		// echo '<br>';
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
		$time = time();

		$sql = "select * from `administrator` where admin_name='$admin_name'";  //只要改这样就可以了
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
			$res = "管理员不存在！";   //这里是因为用户名不存在应该是可以了
		}
		else{
			$sql1 = "select * from `administrator` where admin_pwd='$admin_pwd'";
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
	    $admin_name = htmlspecialchars($_POST['admin_name']);
		$admin_pwd = $_POST['admin_pwd'];   

	    if(isset($_SESSION['admin_name']) && $_SESSION['admin_name']===$admin_name){
	        header('location:backstage.html');
	    }

	    if(isset($_POST['bio_denglu'])){
	        if(isset($_POST['admin_name']) && isset($_POST['admin_pwd']) && $_POST['admin_name']==$admin_name && $_POST['admin_pwd']==$admin_pwd ){
	                $_SESSION['admin_name']=$_POST['admin_name'];
	                header('location:../view/text.php?url=../view/successjump.php&info=登入成功！正在跳转');
	            
	        }  else {
	            header('location:../view/failjump.php?url=../view/tes.php&info=对不起，用户名或密码填写错误！3秒后跳转到登入页面');
	        }
	    }
	}
}


