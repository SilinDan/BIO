<?php

class GoodsDetail extends Db{


	//根据 搜索的值 商品详情显示
	public function datailShow(){
		$goods_name=$_GET['goods_name'];
		$rows='';
		$sql="select * from goods  where goods_name like '%$goods_name%' ";
		return $rows = $this->select($sql);
	}

	//根据二级分类商品详情显示
	public function datailSecondShow(){

		//根据二级名字去查找ID
		$second_name=$_GET['second_name'];
		$sql="select second_id from second  where second_name = '$second_name' ";
		// echo $sql;
		$sec=$this->select($sql);
		$second_id=$sec[0]["second_id"];
		//根据二级ID去查找商品详情
		$rows='';
		$sql="select * from goods  where second_id = '$second_id' ";
		// echo $sql;
		return $rows = $this->select($sql);
	}

	//根据二级分类 系列 商品详情显示
	public function datailSerieShow(){

		//根据二级 系列 名字去查找ID
		$serie_name=$_GET['serie_name'];
		$sql="select serie_id from serie  where serie_name = '$serie_name' ";
		// echo $sql;
		$sec=$this->select($sql);
		$serie_id=$sec[0]["serie_id"];
		//根据二级ID去查找商品详情
		$rows='';
		$sql="select * from goods  where serie_id = '$serie_id' ";
		// echo $sql;
		return $rows = $this->select($sql);
	}


	//根据二级分类 全部 商品详情显示
	public function datailAllShow(){

		//根据二级ID去查找商品详情
		$rows='';
		$sql="select * from goods ";
		// echo $sql;
		return $rows = $this->select($sql);
	}


	//获取一级分类下的二级分类
	public function SecondShow(){
	$cate_id = $_GET['cate_id'];
		$rows='';
		$sql="select * from second where cate_id='$cate_id'";
		return $rows = $this->select($sql);
	}

	//获取系列
	public function SerieShow(){
		$rows='';
		$sql="select * from serie where 1";
		return $rows = $this->select($sql);
	}

	//获取特惠礼盒
	public function GiftShow(){
		$rows='';
		$sql="SELECT * FROM `goods` WHERE `goods_name` LIKE '%礼盒%'";
		return $rows = $this->select($sql);
	}


	//根据排序
	
	//根据 搜索的值 商品详情显示
	public function datailSortShow(){
		$goods_name=$_GET['goods_name'];
		$value=$_GET['value'];

		if ($value=="sort") {
			$rows='';
			$sql="select * from goods  where goods_name like '%$goods_name%' ";
			return $rows = $this->select($sql);
		}

		if ($value=="priceHight") {
			$rows='';
			$sql="select * from goods  where goods_name like '%$goods_name%' order by goods_price desc";
			return $rows = $this->select($sql);
		}

		if ($value=="priceLow") {
			$rows='';
			$sql="select * from goods  where goods_name like '%$goods_name%' order by goods_price";
			return $rows = $this->select($sql);
		}

		if ($value=="man") {
			$rows='';
			$sql="select * from goods  where goods_name like '%$goods_name%' and goods_sex = '男士'";
			return $rows = $this->select($sql);
		}

		if ($value=="woman") {
			$rows='';
			$sql="select * from goods  where goods_name like '%$goods_name%' and goods_sex = '女士'";
			return $rows = $this->select($sql);
		}
	}

	//根据二级分类商品详情显示
	public function datailSecondSortShow(){

		$second_name=$_GET['second_name'];
		$value=$_GET['value'];

		//根据二级名字去查找ID
		$sql="select second_id from second  where second_name = '$second_name' ";
		// echo $sql;
		$sec=$this->select($sql);
		$second_id=$sec[0]["second_id"];

		if ($value=="sort") {
			//根据二级ID去查找商品详情
			$rows='';
			$sql="select * from goods  where second_id = '$second_id' ";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceHight") {
			//根据二级ID去查找商品详情
			$rows='';
			$sql="select * from goods  where second_id = '$second_id' order by goods_price desc";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceLow") {
			$rows='';
			$sql="select * from goods  where second_id = '$second_id' order by goods_price";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="man") {
			$rows='';
			$sql="select * from goods  where second_id = '$second_id' and goods_sex = '男士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="woman") {
			$rows='';
			$sql="select * from goods  where second_id = '$second_id' and goods_sex = '女士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}
	}

	//根据二级分类 系列 商品详情显示
	public function datailSerieSortShow(){
		$serie_name=$_GET['serie_name'];
		$value=$_GET['value'];

		//根据二级 系列 名字去查找ID
		$sql="select serie_id from serie  where serie_name = '$serie_name' ";
		// echo $sql;
		$sec=$this->select($sql);
		$serie_id=$sec[0]["serie_id"];
		//根据二级ID去查找商品详情

		if ($value=="sort") {
			$rows='';
			$sql="select * from goods  where serie_id = '$serie_id' ";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceHight") {
			$rows='';
			$sql="select * from goods  where serie_id = '$serie_id' order by goods_price desc";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceLow") {
			$rows='';
			$sql="select * from goods  where serie_id = '$serie_id' order by goods_price";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="man") {
			$rows='';
			$sql="select * from goods  where serie_id = '$serie_id' and goods_sex = '男士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="woman") {
			$rows='';
			$sql="select * from goods  where serie_id = '$serie_id' and goods_sex = '女士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}
	}


	//根据二级分类 全部 商品详情显示
	public function datailAllSortShow(){
		$value=$_GET['value'];
		//根据二级ID去查找商品详情

		if ($value=="sort") {
			$rows='';
			$sql="select * from goods";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceHight") {
			$rows='';
			$sql="select * from goods order by goods_price desc";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="priceLow") {
			$rows='';
			$sql="select * from goods order by goods_price";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="man") {
			$rows='';
			$sql="select * from goods where goods_sex = '男士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}

		if ($value=="woman") {
			$rows='';
			$sql="select * from goods where goods_sex = '女士'";
			// echo $sql;
			return $rows = $this->select($sql);
		}
	}

}//类结束
?>