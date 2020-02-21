<?php
$sql=$_GET['sql'];
$return=$_GET['rt'];
$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  		die("连接失败: " . $conn->connect_error);
		  		 }
				//准备一条SQL语句
				//执行sql语句，如果是查询语句，成功返回结果集对象；如果不是，成功执行为true，执行失败为false
				$db->query($sql);
				header("location:$return");
?>
