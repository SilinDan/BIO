<?php  
//extends user子类继承db父类
class User extends Db{


	public function GetGoodsInfo($id){

		// $sql = "select * from goods where goods_id ='$id'";  
		// $ikum1 = ($this->select($sql)); 
		// $ikum = $ikum1[0];
		// $second1  = $this->select("select * from second where second_id = $ikum[second_id]");
		// $second= $ikum["second"] = $second1[0];
		// $category1  = $this->select("select * from category where cate_id = $second[cate_id]");
		// $category = $ikum["category"] = $category1[0];
		// return $ikum;

		$sql = "select * from goods where goods_id ='$id'";  
		$ikum = ($this->select($sql))[0]; 
		$second = $ikum["second"] = $this->select("select * from second where second_id = $ikum[second_id]")[0];
		$ikum["category"] = $this->select("select * from category where cate_id = $second[cate_id]")[0];
		return $ikum;

		// $sql = "SELECT * FROM `goods` , `second` , `category` WHERE `goods`.`goods_id` ='$id' AND `second`.`second_id` = `goods`.`second_id` AND `category`.`cate_id` = `second`.`cate_id` ";
		// $ikum = $this->select($sql); 
		// return $ikum;
	}
	public function DeleteGoods($id){
		// $sql = "select * from goods where goods_id ='$id'";  
		$sql =	"DELETE FROM `goods` WHERE goods_id ='$id'";
		$length = $this->delete($sql);
		return $length;
	}

	public function checkGoodsName($name){

		$sql = "select * from goods where goods_name ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	//当前页记录数
	public function sumGoodsId($page,$size)
	{
		$begin = ($page-1)*$size;
		$sql = "select * from goods  order by goods_id limit $begin,$size";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function sumGoodsSize($size)
	{
		$sql = "select * from goods  order by goods_id ";  
		$ikum = $this->select($sql); 
		$length  = sizeof($ikum);
		$pagesize = $length / $size ;
		return $pagesize;
	}
	public function findGoodsId($name){
		$sql = "select * from goods where goods_id='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}


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
		$sql = "select * from information where user_id='$user_id '";  
		$ikum = $this->select($sql); 
		return $ikum;
	}

	//用户注册
	public function goodsAdd()
	{
		$res="商品添加失败！";
		$a = htmlspecialchars($_POST['goods_name']);
		$b = htmlspecialchars($_POST['goods_english']);
		$c = htmlspecialchars($_POST['goods_img']);
		$d = htmlspecialchars($_POST['goods_price']);
		$e = htmlspecialchars($_POST['goods_remain']);
		$f = htmlspecialchars($_POST['goods_size']);
		$g = htmlspecialchars($_POST['goods_detail']);
		$h = htmlspecialchars($_POST['second_name']);
		$l = ($_POST['goods_content']);
		$j = htmlspecialchars($_POST['goods_sex']);
		$serie_name = ($_POST['serie_name']);
		//echo $pwd;//加密的密码
		// $pwd = base64_encode(htmlspecialchars($_POST['pwd']));

		$sql1 = "select * from goods where goods_name ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into goods(goods_name,goods_english,goods_img,goods_price,goods_remain,goods_size,goods_detail,second_id,goods_content,goods_sex,serie_id) values('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}','{$h}','{$l}','{$j}','{$serie_name}')";
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
	//商品修改
		public function goodsAlter()
		{
			$res="商品修改失败！";
			$id = htmlspecialchars($_POST['goods_id']);
			$a = htmlspecialchars($_POST['goods_name']);
			$b = htmlspecialchars($_POST['goods_english']);
			$c = htmlspecialchars($_POST['goods_img']);
			$d = htmlspecialchars($_POST['goods_price']);
			$e = htmlspecialchars($_POST['goods_remain']);
			$f = htmlspecialchars($_POST['goods_size']);
			$g = htmlspecialchars($_POST['goods_detail']);
			$h = htmlspecialchars($_POST['second_name']);
			$l = ($_POST['goods_content']);
			$j = ($_POST['goods_sex']);
			$serie_name = ($_POST['serie_name']);
			if ($c == "") {
			$sql="UPDATE `goods` SET `goods_name`='$a',`goods_detail`='$g',`goods_price`='$d',`goods_remain`='$e',`goods_size`='$f',`goods_english`='$b',`second_id`='$h',`goods_content`='$l',`goods_sex`='$j' ,`serie_id`='$serie_name' WHERE goods_id = $id ";
			}
			else{
				$sql = "UPDATE `goods` SET `goods_name`='$a',`goods_detail`='$g',`goods_price`='$d',`goods_remain`='$e',`goods_size`='$f',`goods_english`='$b',`goods_img`='$c',`second_id`='$h',`goods_content`='$l',`goods_sex`='$j' ,`serie_id`='$serie_name' WHERE goods_id = $id";
			}
		
			if ($this->update($sql) > 0) {
				$res = "商品修改成功！";
			}
			return $res;
		}
		//模糊搜索商品名
		public function searchName(){
			$goods_name = $_GET['goods_name'];
			$goods_id = $_GET['goods_id'];
			$rows='';

			//查找ID为空，则查找名字
			if ($goods_id == "") {
				$sql="select * from goods  where goods_name like '%$goods_name%' ";
			}

			//查找名字为空，则查找ID
			else if ($goods_name == "") {
				$sql="select * from goods  where goods_id like '$goods_id' ";
			}

			//查找名字,ID
			else{
				$sql="select * from goods  where goods_id like '$goods_id' and goods_name like '%$goods_name%'";
			}
			return $rows = $this->select($sql); 
		}

}


