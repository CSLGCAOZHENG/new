<!DOCTYPE html>
<html>
	<head>
		<meta charset="gb2312">
		<title></title>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"> </script>
		<script type="text/javascript"><!--

			$(function(){
				$("#user").click(function(){
					$("#tb1").css("display","block");
					$("#newst").css("display","none");
				});
				$("#news").click(function(){
					$("#tb1").css("display","none");
					$("#newst").css("display","block");
				});
				$("#okuser").click(function(){
				
					var name='"'+$("#iuser").val()+'"';
					var word=$("#iword").val();
					var id=$("#suser").text();
					$(location).attr('href', 'update.php?sql=update account set username='+name+',password='+word+' where id='+id+'&rt= ./manager.php');
				});
				$("#okusern").click(function(){
					
					var id=$("#nid").text();
					var t='"'+$("#ntitle").val()+'"';
					var a='"'+$("#author").val()+'"';
					$(location).attr('href', 'update.php?sql=update news set ntitle='+t+',author='+a+' where nid='+id+'&rt= ./manager.php');
				});
				
			});
			
			function onupuser(id,name,pass){
				$("#iuser").val(name);
				$("#iword").val(pass);
				$("#suser").text(id);
				$("#updateuser").css("display","block");
			}
			function cancel(){
				$("#updateuser").css("display","none");
				$("#updatenews").css("display","none");
			}

			function onupnews(id,name,pass){
				$("#nid").text(id);
				$("#ntitle").val(name);
				$("#author").val(pass);
				$("#updatenews").css("display","block");
			}
		--></script>
		<style><!--
			.top{
				float:left;
				width:100%;
				height:40px;
				background: rgb(64, 142, 214);
			}
			table{
				width:100%;
				
			}
			tr{
				
				height:50px;
				width:100%;
				
			}
			td{
				background:lightyellow;
			
				height:50px;
			}
			a{
			color:black;
			text-decoration:none;
			}
		--></style>
	</head>
	<body>
		<div class="top" style="float: left;">
		<a  href="index.php" style="color:white; text-decoration:none;"><b>��ҳ</b></a>
		</div>
		<div style="float:left;width:9%;"></div>
		<div style="float:left;width:82%;margin-top:50px;background:white;">
			<div style="width:100%;height:40px;border:red 1px solid;text-align:center;">
				<span>����Ա</span>
			</div>
			<div id="user" style="width:20%;height:40px;border:red 1px solid;margin-top:40px;text-align:center;">
				<span>�˻�����</span>
			</div>
			<div id="news" style="width:20%;height:40px;margin-top:20px;border:red 1px solid;text-align:center;">
				<span>���Ź���</span>
			</div>
			<div id="context" style="width:78%;border:red 1px solid;float:right;margin-top:-142px;
			background:lightgreen;
			position:relative">
				<div id="updateuser" style="display:none;width:500px;height:200px;border-radius:10px;background:lightgrey;position:absolute;margin-left:130px;margin-top:50px;">
					<div style="margin:30px;">
					    ��ţ�<span id="suser"></span><br>
						<lable for="user">�û���:&nbsp;</lable>
						<input name="user" id="iuser" style="border:1px solid lightgrey;border-radius:5px;width:200px;height:25px;"/>
						
					</div>
					<div style="margin:30px;">
						<lable for="pass">����:&nbsp;</lable>
						<input name="pass" id="iword" style="border:1px solid lightgrey;border-radius:5px;width:200px;height:25px;"/>
						
					</div>
					<button id="okuser"; style="border:1px solid lightgrey;border-radius:5px;background;white;height:25px;">ȷ���޸�</button>
					<button onclick="cancel()" style="border:1px solid lightgrey;border-radius:5px;background;white;height:25px;">ȡ��</button>
				</div>
				<div id="updatenews" style="display:none;width:500px;height:200px;border-radius:10px;background:lightgrey;position:absolute;margin-left:130px;margin-top:50px;">
					<div style="margin:30px;">
					    ��ţ�<span id="nid"></span><br>
						<lable for="ntitle">����:&nbsp;</lable>
						<input name="ntitle" id="ntitle" style="border:1px solid lightgrey;border-radius:5px;width:200px;height:25px;"/>
						
					</div>
					<div style="margin:30px;">
						<lable for="author">����:&nbsp;</lable>
						<input name="author" id="author" style="border:1px solid lightgrey;border-radius:5px;width:200px;height:25px;"/>
						
					</div>

					<button id="okusern"; style="border:1px solid lightgrey;border-radius:5px;background;white;height:25px;">ȷ���޸�</button>
					<button onclick="cancel()" style="border:1px solid lightgrey;border-radius:5px;background;white;height:25px;">ȡ��</button>
				</div>
				<table id="tb1" style="width:100%;">
				<tr style="text-align:center;">
					<td>���</td>
					<td>�˻�</td>
					<td>����</td>
					<td>����</td>
				</tr>
				<?php
									$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  		die("����ʧ��: " . $conn->connect_error);
  			 
		  		 }
				
				//׼��һ��SQL���
				$sql="select * from account";
				//ִ��sql��䣬����ǲ�ѯ��䣬�ɹ����ؽ��������������ǣ��ɹ�ִ��Ϊtrue��ִ��ʧ��Ϊfalse
				$reslut =$db->query($sql);
				if($reslut){
					while ($attr=$reslut->fetch_row()){
							echo "<tr>";
							echo "<td>$attr[0]</td>";
							echo "<td>$attr[1]</td>";
							echo "<td>$attr[2]</td>";
							echo "<td>";
							echo "<a onclick=onupuser($attr[0],'$attr[1]','$attr[2]')>�޸�</a>";
							echo ' ';
							echo "<a href='./update.php?sql=delete from account where id=$attr[0]&rt= ./manager.php'>ɾ��</a>";
							echo "</td>";
							echo "</tr>";
						}
					}
				?>
				</table>
				<!--
<!--				����-->
				<table id="newst" style="width:100%;display:none">
				<tr style="text-align:center;">
					<td>���</td>
					<td>����</td>
					<td>����</td>
					<td>ʱ��</td>
					<td>ͼƬ·��</td>
					<td>�༭</td>
				</tr>
				<?php
													$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				
				
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  		die("����ʧ��: " . $conn->connect_error);
  			 
		  		 }
				
				//׼��һ��SQL���
				$sql="select * from news";
				//ִ��sql��䣬����ǲ�ѯ��䣬�ɹ����ؽ��������������ǣ��ɹ�ִ��Ϊtrue��ִ��ʧ��Ϊfalse
				$reslut =$db->query($sql);
				if($reslut){
					while ($attr=$reslut->fetch_row()){
							echo "<tr>";
							echo "<td>$attr[0]</td>";
							echo "<td>$attr[1]</td>";
							echo "<td>$attr[3]</td>";
							echo "<td style='width:20px;'>$attr[4]</td>";
							echo "<td>$attr[5]</td>";
							echo "<td>";
							echo "<a onclick=onupnews($attr[0],'$attr[1]','$attr[3]')>�޸�</a>";
							echo ' ';
							echo "<a href='./update.php?sql=delete from news where nid=$attr[0]&rt= ./manager.php'>ɾ��</a>";
							echo "</td>";
							echo "</tr>";
						}
					}
				?>
				</table>
			</div>
			<?php include 'boot.php';?>
		</div>
		
	</body>
</html>

<?php
