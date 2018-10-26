<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/category.class.php");
  $user = new User() ;
  
  
	if (isset($_GET['cate'])&&$_GET['cate']=="ajaxGetCateInfo") {
	
		$ikum = $user->GetCategoryInfo(); 

		echo json_encode($ikum);
	}

  if (isset($_GET['cate'])&&$_GET['cate']=="ajaxGetSecondInfo") {
  
    $id = $_POST['id'];
		$ikum = $user->GetSecondInfo($id); 

		echo json_encode($ikum);
	}

	if (isset($_GET['cate'])&&$_GET['cate']=="add") {
	 
		$res = $user->inputCate();
		if ($res == '分类添加成功！') {
			echo "<script>alert('分类添加成功！');window.history.go(-1);</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}
	if (isset($_GET['second'])&&$_GET['second']=="add") {
	 
		$res = $user->inputSecond();
		
		if ($res == '二级分类添加成功！') {
			echo "<script>alert('二级分类添加成功！');window.history.go(-1);</script>";
		}
		else {
			echo "<script>alert('$res');window.history.go(-1);</script>";
		}
	}

  ?>

