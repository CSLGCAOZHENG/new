<?php
$sql=$_GET['sql'];
$return=$_GET['rt'];
$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  		die("����ʧ��: " . $conn->connect_error);
		  		 }
				//׼��һ��SQL���
				//ִ��sql��䣬����ǲ�ѯ��䣬�ɹ����ؽ��������������ǣ��ɹ�ִ��Ϊtrue��ִ��ʧ��Ϊfalse
				$db->query($sql);
				header("location:$return");
?>
