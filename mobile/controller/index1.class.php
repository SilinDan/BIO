<?php

class GoodsDetail extends Db{


	//商品详情显示
	public function datailShow(){
		$rows='';
		$sql="select * from goods";
		// echo $sql;
		return $rows = $this->select($sql);
		// echo $num;
	}
	public function GoodsIdtoShop($goods,$id)
		{
			$res="商品添加失败！";
			$a = $goods;
			$b = $id;
			
			$sql1 = "select * from shop where goods_id ='$a' and id = '$b'";  
			$ikum = $this->select($sql1); 
			$length = sizeof($ikum);
			
			if($length==0){
					$sql = "insert into shop(goods_id,id,shop_num) values('{$a}','{$b}','1')";
					if ($this->insert($sql)>0) {
						$res = "商品添加成功！";
					}
					return $res;
			}
			else{
					$sql = "UPDATE shop SET shop_num=shop_num+1 WHERE goods_id = '$a' and id = '$b'"; 
					if ($this->update($sql)>0) {
						$res = "商品添加成功！";
					}
					return $res;
			}
			
		}
	public function GoodsIdtoShopMore($goods,$id,$num)
		{
			$res="商品添加失败！";
			$a = $goods;
			$b = $id;
			$c = $num;
			
			$sql1 = "select * from shop where goods_id ='$a' and id = '$b'";  
			$ikum = $this->select($sql1); 
			$length = sizeof($ikum);
			
			if($c==1&&$length==0){
					$sql = "insert into shop(goods_id,id,shop_num) values('{$a}','{$b}','1')";
					if ($this->insert($sql)>0) {
						$res = "商品添加成功！";
					}
					return $res;
			}
			else if($c!=1&&$length==0){
					$sql = "insert into shop(goods_id,id,shop_num) values('{$a}','{$b}','{$c}')";
					if ($this->insert($sql)>0) {
						$res = "商品添加成功！";
					}
					return $res;
			}
			else{
					$sql = "UPDATE shop SET shop_num=shop_num+'$c' WHERE goods_id = '$a' and id = '$b'"; 
					if ($this->update($sql)>0) {
						$res = "商品添加成功！";
					}
					return $res;
			}
			
		}
	public function deleteGoods($id)
		{
			$res="商品删除失败！";
			$b = $id;
			
			$sql1 = "select * from shop where shop_id = '$b'";  
			$ikum = $this->select($sql1); 
			$length = sizeof($ikum);
			
			if($length!=0){
					$sql = "DELETE FROM `shop` WHERE shop_id = '$b'";
					if ($this->delete($sql)>0) {
						$res = "商品删除成功！";
					}
					return $res;
			}
			else{
					return $res;
			}
			
		}
	public function deleteUser_id($id)
		{
			$res="地址删除失败！";
			$b = $id;
			
			$sql = "DELETE FROM `information` WHERE user_id = '$b'";
			if ($this->delete($sql)>0) {
				$res = "地址删除成功！";
				return $res;
			}

			return $res;
			
			
		}
		public function updateGoods($id)
			{
				$res="失败！";
				$b = $id;
				
				$sql1 = "select * from shop where shop_id = '$b'";  
				$ikum = $this->select($sql1); 
				
				if($ikum[0]['shop_num']>=2){
					$sql = "UPDATE shop SET shop_num=shop_num-1 where shop_id = '$b'"; 
					if ($this->update($sql)>0) {
						$res = "商品已减1！";
					}
					return $res;
				}
				else if($ikum[0]['shop_num']==1){
					
					$res = "再减就没有了！";
					return $res;
				}
			}
		public function addGoodssum($id)
			{
				$res="失败！";
				$b = $id;
				
				$sql = "UPDATE shop SET shop_num=shop_num+1 where shop_id = '$b'"; 
				if ($this->update($sql)>0) {
					$res = "商品已减1！";
				}
				return $res;
			}	
		public function checkUserName($name){
		
				$sql = "select * from user where user_phone ='$name'";  
				$ikum = $this->select($sql); 
				return $ikum;
			}

}

?>