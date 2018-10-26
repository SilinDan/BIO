<?php
 
class Order extends Db{
	public function checkUserName($name){
		$sql = "select * from user where user_phone ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkOrder($name){
		$sql = "select * from `order` where order_num ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	public function checkShop($name){
		$sql = "select * from shop where id ='$name'";  
		$ikum = $this->select($sql); 
		return $ikum;
	}
	//商品详情显示
	public function orderAdd($h,$a,$k,$l,$id){
		$res="订单下单失败！";
		
		$h= $h;
		$a= $a;
		$k= $k;
		$l= $l;
		$id= $id;
		$n= time();
		$time = date("Ymd",$n);
		$time1 = date("His",$n); 
		$m = $time.$l.$id.$time1;
		
		$sql = "insert into `order`(id,user_id,message,invoice,sum_price,order_state,pay_state,pay_way,send_way,send_state,order_time,order_num)values('{$id}','{$l}','{$h}','{$a}','{$k}','待确认','待支付','支付宝','顺风物流','待发货','{$n}','{$m}')";
		
		$sql1 = "select * from shop where id ='$id'";  
		$shop = $this->select($sql1); 
		$shop_sum  = sizeof($shop);
		for($i=0;$i<$shop_sum;$i++){
			$goods_id = $shop[$i]['goods_id'];
			$shop_num = $shop[$i]['shop_num'];
			$sql2="insert into `order_detail`(goods_id,goods_sum,order_num)values('$goods_id','$shop_num','$m')";
			if($this->insert($sql2)>0){
				$sql3 = "DELETE FROM `shop` WHERE id = '$id'";
				$this->delete($sql3);
			}
		}
		
		
		if ($this->insert($sql)>0) {
			$res = $m;//返回订单编号给下一页付款
		}
		return $res;
		// echo $num;
	}
	public function buyAgain($a,$id){
		$res="再次购买失败！";
		
		
		$sql1 = "select * from `order_detail` where order_num ='$a'";  
		$order_detail = $this->select($sql1); 
		$order_sum  = sizeof($order_detail);
		for($i=0;$i<$order_sum;$i++){
			$goods_id = $order_detail[$i]['goods_id'];
			$goods_sum = $order_detail[$i]['goods_sum'];
			
			$sql2 = "select * from shop where goods_id ='$goods_id' and id = '$id'";  
			$ikum = $this->select($sql2); 
			$length = sizeof($ikum);
			
			if($length==0){
					$sql="insert into `shop`(goods_id,shop_num,id)values('$goods_id','$goods_sum','$id')";
					if($this->insert($sql)>0){
						$res="再次购买成功！";
					}
			}
			else{
					$sql = "UPDATE shop SET shop_num=shop_num+1 WHERE goods_id = '$goods_id' and id = '$id'"; 
					if ($this->update($sql)>0) {
						$res = "再次购买成功！";
					}
			}	
		}
		return $res;
	}
	public function updateOrder($a){
		$res="订单修改失败！";
	
		$a= $a;
		
		$sql = "UPDATE `order` SET pay_state='已支付' WHERE order_num = '$a'";
		
		if ($this->update($sql)>0) {
			$res = "订单修改成功！";//返回订单编号给下一页付款
		}
		return $res;
		// echo $num;
	}
	public function updateOrderState($a){
		$res="订单修改失败！";
	
		$a= $a;
		
		$sql = "UPDATE `order` SET order_state='已取消' WHERE order_num = '$a'";
		
		if ($this->update($sql)>0) {
			$res = "订单修改成功！";//返回订单编号给下一页付款
		}
		return $res;
		// echo $num;
	}
	public function delOrderDetail($a){
		$res="订单删除失败！";
	
		$a= $a;
		
		// $sql = "DELETE FROM `order_detail` WHERE order_num = '$a'";
		$sql1 = "DELETE FROM `order` WHERE order_num = '$a'";
		
		if ($this->delete($sql1)>0) {
			$res = "订单删除成功！";//返回订单编号给下一页付款
		}
		return $res;
		// echo $num;
	}


}

?>