<?php
error_reporting(E_ALL || ~E_NOTICE);
 header('Content-type:text/html;charset=utf-8');

class GoodsDetail extends Db{
	//商品详情显示
	public function mostloved(){
		$rows='';
		$sql="SELECT * FROM order_detail, goods WHERE goods.goods_id = order_detail.goods_id GROUP BY order_detail.goods_id ORDER BY count( 1 ) DESC ";
		return $rows = $this->select($sql);
	}
	
}

?>