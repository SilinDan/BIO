<?php  
//extends user子类继承db父类
class User extends Db{



public function changepwd()
		{
			$res="修改密码失败！";
			$a = htmlspecialchars($_POST['admin_name']);
			$b = htmlspecialchars($_POST['admin_newpwd']);
		
			
			$sql = "UPDATE  `administrator` SET `admin_pwd`='$b' WHERE admin_name =$a";
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
			return $res;
		}
	}