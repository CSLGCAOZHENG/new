<!DOCTYPE html>
<html>

	<head>
		<meta charset="gb2312">
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"> </script>
		<script><!--
		var nid=null;
		var user=null;
		var comment=null;
		var date=null;
		
		
		function sendnews(id,user1,date1){
			nid=id;
			user=user1;
			date=date1;
		}
		$(function(){
			

			$("#bt1").click(function(){
				if(user==""||user==null)
				alert("未登录无法发表评论");
				
				else
					comment= $("#t1").val();
					$(location).attr('href', 'release.php?nid='+nid+'&user='+user+'&comment='+comment+'&date='+date+'');
				
				
			});
			});
		
		--></script>
		<style>
			body {
				background: whitesmoke;
				margin: 0px;
				padding: 0px;
			}
			
			.top {
				float: left;
				width: 100%;
				height: 40px;
				background: rgb(64, 142, 214);
			}
			
			.mid {
				float: left;
				width: 68%;
				height: 700px;
				background: white;
			}
		</style>
		<title></title>
	</head>

	<body>
		<div class="top">
			<a  href="index.php" style="color:white; text-decoration:none;"><b>首页</b></a>
		</div>
		<div style="width:16%;height:700px;float:left;"></div>
		<div class="mid">
			<div style="float:left;text-align:center;width:100%;">
			<?php
			$nid=$_GET['nid'];
			$sql = "select * from news where nid='$nid'";
			$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
			$db->query("set names 'gb2312'");
			if ($db->connect_error) {
  				die("连接失败: " . $conn->connect_error);
			}
			else{
				$reslut =$db->query($sql);
				$attr=$reslut->fetch_row();				
			}
			$img=$attr[5];
			echo '
				<span style="font-size: 30px;width:100%;">'.$attr[1].'</span>
			</div>
			<div style="float:left;margin-right:40px;width:100%;">
				<div style="float:right;margin-right:30px;"><p style="margin-top:30px;float:right;">作者：'.$attr[3].'&nbsp;发表时间：'.$attr[4].'</p></div>
			</div>
			<div style="width:100%;text-align:center;">';
			echo "	<img src='$img' height='300px'/>";
			echo '</div>
			<div>';
				
			echo" $attr[2]";

			echo '</div>
			
			
		</div>';
			$user=null;
			session_start();
			if(isset($_SESSION['user'])){
				$user=$_SESSION['user'];
			}
			
			$date=date("Y/m/d/g/i/s");
			if(isset($_GET['comment'])){
					$comment=$_GET['comment'];
					$sql1="insert into comment (user,nid,comments,date) values('$user','$nid','$comment','$date')";
			//$sql = "select * from comment where nid='$nid'";
			$reslut =$db->query($sql1);
				}
			if(!empty($_SESSION['user'])){
				if(isset($_GET['user']))
				/*$user=$_GET['user'];*/
				{}
				
			
			
			
			
			
			}
			
			
			
			
			
			
				
		echo '<div style=" float:left;width:68%;height:250px;margin-left:16%;">发表评论';
			
		echo "<textarea id='t1' style='width:100%;height:200px;'></textarea>";
		
		echo "<button id='bt1' onclick=sendnews('$nid','$user','$date')>确定</button>";
		
		
		
		$sql = "select * from comment where nid='$nid'";
		$reslut =$db->query($sql);
		echo '
		</div>
		<div style=" float:left;width:68%;margin-left:16%;">';
		echo "	<p>评论</p>"; 
		$reslut =$db->query($sql);
		while($attr=$reslut->fetch_row()){
			echo "	<p>$attr[1]&nbsp;$attr[4]</p>"; 
		echo "	<div style='width:100%;height:100px;border:1px royalblue solid;'>";
		echo "		<p>$attr[3]</p>";
		echo "</div>";
		}
		
		echo '
		
		</div>';

	 include 'boot.php';
	
?>
	</body>

</html>