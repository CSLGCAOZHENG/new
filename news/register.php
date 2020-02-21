<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="gb2312">  
    <title>Login</title>  
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style type="text/css">
		html{
			background-color:whitesmoke;
		}
		#container-fluid div{
			text-align:center;
			padding-right: 0px;
  			padding-left: 0px;
  			margin-right:0px;
  			margin-left:0px;
		}
		#body{
			width:100%;height:758px;
			flex: 1;
			background-color:whitesmoke;
		}
		#body:hover{getheight()}
		.table{position:relative;
			   left:32.5%;
			   top:33%;
			   width:35%;
			   height:300px;
			   background:lightblue;
			   border-radius:10px;	
			   font-size:13px;
		}
		.table_left{
			float:left;
			width:40%;
			height:100%;
			background-color:rgb(255,169,29);
			border-top-left-radius:10px;
			border-bottom-left-radius:10px;
		}
		.table_right{
			float:left;
			width:60%;
			height:100%;
			background-color:white;
			border-top-right-radius:10px;
			border-bottom-right-radius:10px;
		}
		.z1{position:absolute;
			left:45%;
			top:5%;
		}
		.z2{
			position:absolute;
			left:45%;
			top:24%;
		}
		.z2:hover{
			border-bottom-color:rgb(255,169,29);
		}
		.z3:hover{
			border-bottom-color:rgb(255,169,29);
		}
		.z3{
			position:absolute;
			left:45%;
			top:36%;
		}
		input{
			border: 0px;outline:none;cursor: pointer;
			border-bottom: 1px solid rgb(206,206,206);
			width:275px;
		}
		.glyphicon-user{position:absolute;
						left:92%;
						top:26%;
						color:rgb(206,206,206);
		}
		.glyphicon-lock{
						position:absolute;
						left:92%;
						top:38%;
						color:rgb(206,206,206);
		}
		.s1{
			position:absolute;
			left:44%;
			top:71%;
			height:25px;
			border-radius:20px;
			background:white;
			color:rgb(255,169,29);
			border:1 solid red; 
			
		}
		.s1:hover{
			background:rgb(255,169,29);
			color:white;
		}
		
	</style>
</head>  
<body>  
    <div id="container-fluid">
		<div id="body">
			<div class="table">
				<div class="table_left"></div>
				<div class="table_right">
					<span class="z1">账号密码注册</span>
					<form action="register.php" method="post">
						<input class="z2" name="username" type="text" placeholder="账号"/><span class="glyphicon glyphicon-user"></span>
						<input class="z3" name="password" type="text" placeholder="密码"/><span class="glyphicon glyphicon-lock"></span>
						<input class="s1" type="submit" value="注册" style="border:1px solid rgb(206,206,206);">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>  

</html>
<?php
				session_start();
				//造连接对象：造一个mysql对象
				/*header("content-Type: text/html; charset=gb2312");*/
				$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  die("连接失败: " . $conn->connect_error);
		}
				
				//准备一条SQL语句
				if(isset($_POST['username'])){
					$username=$_POST['username'];
				$password=$_POST['password'];
				
				$sql = "insert into account (username,password) values('$username','$password')";
				echo $sql;

				

				$reslut =$db->query($sql);
				echo "<script>alert('注册成功，请登录')</script>";
			$url="login.php";
			echo "<SCRIPT LANGUAGE='javascript'>"; 
			echo "location.href='$url'"; 
			echo "</SCRIPT>";		
				}
				
				
				
?>		
		<script>
		alert("注册成功);
		</script>
    

				
		
    

		





























