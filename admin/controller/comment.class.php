<?php  
//extends user子类继承db父类
class User extends Db{


	//当前页记录数
	public function sumCommentId($page,$size)
	{
		$begin = ($page-1)*$size;
		$sql = "select * from comment  order by com_id limit $begin,$size";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function sumCommentSize($size)
	{
		$sql = "select * from comment  order by com_id ";  
		$ikum = $this->select($sql); 
		$length  = sizeof($ikum);
		$pagesize = $length / $size ;
		return $pagesize;
	}
	//用户注册
	public function commentAdd()
	{
		$res="商品添加失败！";
		$a = htmlspecialchars($_POST['com_name']);
		$b = htmlspecialchars($_POST['com_english']);
		$c = htmlspecialchars($_POST['com_img']);
		$d = htmlspecialchars($_POST['com_price']);
		$e = htmlspecialchars($_POST['com_remain']);
		$f = htmlspecialchars($_POST['com_size']);
		$g = htmlspecialchars($_POST['com_detail']);

		//echo $pwd;//加密的密码
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));

		$sql1 = "select * from comment where com_name ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into comment(com_name,com_english,com_img,com_price,com_remain,com_size,com_detail) values('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}')";
		// echo $sql;
		// if ($this->insert($sql)>0) {
		// 	echo "<script>alert('用户名注册成功！');window.location.href='../view/resg.v.html';</script>";
		// }
		// else{
		// 	echo "<script>alert('用户注册失败！');window.history.go(-1);</script>";
		// }
		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "商品添加成功！";
		}
		return $res;
	}
	public function commentDelete($id){
		$sql =	"DELETE FROM `comment` WHERE com_id ='$id'";
		$length = $this->delete($sql);
		return $length;
	}
	//商品修改
		public function commentAlter()
		{
			$res="商品修改失败！";
			$id = htmlspecialchars($_POST['com_id']);
			$a = htmlspecialchars($_POST['com_name']);
			$b = htmlspecialchars($_POST['com_english']);
			$c = htmlspecialchars($_POST['com_img']);
			$d = htmlspecialchars($_POST['com_price']);
			$e = htmlspecialchars($_POST['com_remain']);
			$f = htmlspecialchars($_POST['com_size']);
			$g = htmlspecialchars($_POST['com_detail']);
			$i = htmlspecialchars($_POST['second_name']);
			//echo $pwd;//加密的密码
			// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));
	
			// $sql1 = "select * from comment where com_name ='$a'";  
			// $ikum = $this->select($sql1); 
			// $length = sizeof($ikum);
	
			// $sql = "insert into comment(com_name,com_english,com_img,com_price,com_remain,com_size,com_detail) values('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}')";
			$sql = "UPDATE `comment` SET `com_name`='$a',`com_detail`='$g',`com_price`='$d',`com_remain`='$e',`com_size`='$f',`com_english`='$b',`com_img`='$c',`second_id`='$i' WHERE com_id = $id";
			if ($this->update($sql) > 0 && $length <= 0) {
				$res = "商品修改成功！";
			}
			return $res;
		}

		//模糊搜索商品名
		public function searchName(){
			$com_user = $_GET['com_user'];
			$com_goods = $_GET['com_goods'];
			$rows='';

			//查找ID为空，则查找名字
			if ($com_user == "") {
				$sql="select * from comment where com_goods like '%$com_goods%' ";
			}

			//查找名字为空，则查找ID
			else if ($com_goods == "") {
				$sql="select * from comment  where com_user like '%$com_user%' ";
			}

			//查找名字,ID
			else{
				$sql="select * from comment  where com_goods like '$com_goods' and com_user like '%$com_user%'";
			}
			return $rows = $this->select($sql); 
		}

}


