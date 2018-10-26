<?php
	// echo __DIR__; //绝对路径
	// echo "<br/>";
	// echo dirname(__DIR__);//相对路径

	// $conf = include(__DIR__."./config.php");//用.来做连接符
	// echo "<pre>";
	// print_r($conf);
	// echo "</pre>";

	class Db{
		public $conn;
		public function __construct()//构造函数 自动执行
		// public function init()
		{
			$conf  =  include(__DIR__."/config.php");
			$this->conn = mysqli_connect($conf['HOST'],$conf['USER'],$conf['PWD']);
			mysqli_select_db($this->conn,$conf['DB']);
			mysqli_query($this->conn,'set names utf-8');//防止乱码
			// echo "<br/>";
			// print_r($conf);
			// var_dump($this->conn);
		}
		//选取 添加 删除 修改
		/* 
			作用：选取内容
			参数1：$sql 字符串
			返回：$res 二维数组
		*/
		public function select($sql){
			//$sql = "select * from user";
			$rows = [];
			$res = mysqli_query($this->conn,$sql);
			while ($row = mysqli_fetch_assoc($res)) {
				$rows[]=$row;
			}
			return $rows;
		}
		//添加数据内容
		public function insert($sql)
		{
			// $sql = "insert into user(name,pwd) values('15655','159')";
			$res = mysqli_query($this->conn,$sql);
			return mysqli_affected_rows($this->conn);
			
		}
		//修改数据内容
		public function update($sql)
		{
			//$this->init();//在方法里面嵌套class里面的方法用this
			$res = mysqli_query($this->conn,$sql);
			return mysqli_affected_rows($this->conn);
		}
		//删除数据内容
		public function delete($sql)
		{
			// $sql = "delete from user ";
			$res = mysqli_query($this->conn,$sql);
			return mysqli_affected_rows($this->conn);
		}
		public function __destruct()
		{
			if ($this->conn) {
				mysqli_close($this->conn);
			}
		}
	}
	// $db = new Db();//实例化类，生成一个子对象
	// $db->init();//一定要写

	// $sql = "update user set name= 'what' ,pwd='8896' where id='4' ";
	// $row = $db->update($sql);
	// echo $row;

	// $sql = "insert into user(name,pwd) values('what','188')";
	// $row = $db->insert($sql);
	// echo $row;
	
	// $sql = "delete from user ";
	// $sql = "delete from user where id = '5' and name='ok' ";
	// $sql = "delete from user where id = '5' or name='ok' ";
	// $row = $db->delete($sql);
	// echo $row;
	
	// $sql = "select * from user";
	// $row = $db->select($sql);
	// echo "<pre>";
	// print_r($row);
	// echo "</pre>";

?>