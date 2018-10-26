<?php  
//extends user子类继承db父类
class User extends Db{

	public function checkcategoryName($name){

		$sql = "select * from category where cate_name ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum ;
	}

	public function GetCategoryInfo(){
		$category = "select * from category";  
    $ikum = ($this->select($category)); 
		return $ikum;
	}

	public function GetSecondInfo($id){
		$second = "select * from second where cate_id = $id";  
	    $ikum = ($this->select($second)); 
		return $ikum;
	}

	public function inputCate(){
		$res="分类添加失败！";

		$a = htmlspecialchars($_POST['cate_name']);

		$sql1 = "select * from category where cate_name ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		$sql = "insert into category(cate_name) values('{$a}')";

		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "分类添加成功！";
		}
		return $res;
	}
	public function inputSecond(){
		$res="二级分类添加失败！";

		$a = htmlspecialchars($_POST['second_name']);
		$b = htmlspecialchars($_POST['cate_name1']);

		$sql1 = "select * from second where second_name ='$a'";  
		$ikum = $this->select($sql1); 
		$length = sizeof($ikum);

		//读取b的整列数据
		// $sql2 = "select * from category where cate_id ='$b'"; 
		// $ikum2 = $this->select($sql2);
		// $c =  $ikum2[0]["cate_name"];

		$sql = "insert into second(second_name,cate_id) values('{$a}','{$b}')";

		if ($this->insert($sql)>0 && $length <= 0) {
			$res = "二级分类添加成功！";
		}
		return $res;
	}

}


