<?php
error_reporting(E_ALL || ~E_NOTICE);
 session_start();
 header('Content-type:text/html;charset=utf-8');

class GoodsDetail extends Db{


	//商品详情显示
	public function datailShow(){
		$goods_id = $_GET['goods_id'];

		$rows='';
		$sql="select * from goods  where goods_id='$goods_id'";
		// echo $sql;
		return $rows = $this->select($sql);
		// echo $num;
	}
	//推荐搭配随机显示
	public function randShow(){
		$rows='';
		$sql="SELECT * FROM `goods` , `second` WHERE `goods`.`second_id` = `second`.`second_id` ORDER BY rand( ) LIMIT 3 ";
		return $rows = $this->select($sql);
	}

	public function CommentShow(){
		$goods_id = $_GET['goods_id'];
		$rows='';
		// $sql="SELECT * FROM `comment`,`goods` where comment.goods_id = goods.goods_id AND comment.goods_id ='$goods_id'";
		$sql = "SELECT *FROM `comment` , `goods` , `user` WHERE comment.goods_id = goods.goods_id AND comment.goods_id ='$goods_id' AND comment.id = user.id";
		return $rows = $this->select($sql);
	}

	public function CommentAdd($id){
		$com_user = $_SESSION['logname'];
		$com_content = $_POST['com_content'];
		$com_star = $_POST['com_star'];
		$com_time = time();
		$goods_id = $_POST['goods_id'];

		$sql = "SELECT goods_name FROM `goods` WHERE goods_id='$goods_id'";
		$name=$this->select($sql);
		$com_goods=$name[0]["goods_name"];

		$com_label = $_POST['com_label'];
		$com_labelval=implode(',',$com_label);
		$com_buyway = $_POST['com_buyway'];
		$time = date('Y-m-d H:i:s', $com_time);
		$rows='';
		$sql = "INSERT INTO `comment`(  `com_content`,`com_user`  ,`com_star` , `com_time`, `id`, `goods_id`, `com_goods`,`com_label`, `com_buyway`) VALUES ( '$com_content','$com_user','$com_star','$time','$id','$goods_id','$com_goods','$com_labelval','$com_buyway') ";
		return $rows = $this->select($sql);
}
	//数据库更新点赞数
	public function commentZan(){
		
		$com_id = $_GET['com_id'];
		$com_like = $_GET['com_like'];
		$sql = "update comment set com_like= '$com_like' where com_id='$com_id' ";
		return $ikum = $this->update($sql);
	}

}

?>