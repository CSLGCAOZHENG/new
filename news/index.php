<!DOCTYPE html>
<html>

	<head>
		<meta charset="gb2312">
		<title></title>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		
		<script type="text/javascript" src="js/banner.js" ></script>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"> </script>
		<script>
		var nid=null;
		
		
		function sendnews(id){
			nid=id;
		}
		$(function(){
			$(".td1").click(function(){
				$(location).attr('href', 'release.php?nid='+nid+'');
			});
			});
		
		</script>
		<style><!--
			.shang{
					width: 100%;
					height:340px;
					float:left;
			}
			.point{
				width:26%;
				height:340px;
				float:left;
				margin-left:10px;
				background:white;
				text-align:center;
			}
			.personal{
				width:24%;
				margin-left:10px;
				height:340px;
				float:left;
				background:white;
				text-align:center;
			}
			#pic{
			width:100%;
			height:100%
			}
			.s1{
			width:9%;
			height:340px;
			float:left;
			}
			.release{
			font-size:20px;
			position:relative;
			top:100px;
			}
			a {text-decoration: none;color:red;}
			.search {
    					width: 200px;
    					height: 30px;
    					border-radius: 18px;
    					outline: none;
    					border: 1px solid #ccc;
    					padding-left: 20px;
    					position: relative;
					}
			.btn1 {
    			height:30px;
    			width: 30px;
    			position:relative;
    			left:-50px;
    			background: url(img/timg.jpg) no-repeat;
				background-size: cover;
    			border: none;
    			outline: none;
    			cursor: pointer;
			}
			.login span a{
				color:white;
			}
			table{
				width: 100%;
				background:white;
			}
			td{
				height:50px;
				
			}
			#tableid td (
				cursor:hand;
			)

		</style>
	</head>

	<body>
		<div class="top">
			<div class="login">
			<?php 
			session_start();
			$username=null;
			if(empty($_SESSION["user"]))		
			echo '<span><a href="login.php">��¼</a></span>';
			
			else{
				$username=$_SESSION["user"];
			echo '<span><a href="login.php">'.$username.'</a></span>';
			}
			?>
				
			</div>
		</div>
		<div class="shang">
		<div class="s1"></div>
		<div id="box">
			<img id="pic" src="img/1.png"/>
			<ul id="list">
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
			<div class="btn" id="left"> &lt;</div>
			<div class="btn" id="right">&gt;</div>
		</div>
		
		
			
				<?php
				
				echo '<div class="point">';
				//�����Ӷ�����һ��mysql����
				/*header("content-Type: text/html; charset=gb2312");*/
								$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
				
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  die("����ʧ��: " . $conn->connect_error);
		}
				
				//׼��һ��SQL���

				$sql = "select * from news";

				//ִ��sql��䣬����ǲ�ѯ��䣬�ɹ����ؽ��������������ǣ��ɹ�ִ��Ϊtrue��ִ��ʧ��Ϊfalse

				$reslut =$db->query($sql);

				//�жϷ����Ƿ�ִ�гɹ�
				echo "<span style='text-align:center;font-size:40px;'>�ȵ�����</span>";
				if($reslut){
					$i=0;
			while ($attr=$reslut->fetch_row()){
				$i++;
				if($i>=6) break;
			echo "<p>$attr[1]</p>";
			}	
		}
			
		echo "</div>";
		echo " <div id='person' class='personal'>";
		echo '<span class="release"><a href="re.php">��������</a></span>';
		echo '<div class="searchAction">
    		<form action="#" class="parent" method="get">
    		<input type="text" name="a" value="query" style="width:1px;display:none;">
        		<input type="text" name="title" class="search" placeholder="����">
        		<input type="submit" value=" "  id="find" class="btn1">
    		</form>
			</div>';
		echo "</div>";
		
		?>
		</div>
		<?php 
		echo '
		<div style="float: left;width: 9%;"></div>
		<div style="width:82%;height:100px;background:whitesmoke;text-align: center;margin:0 auto;">';
		
		if(isset($_GET['a'])&&$_GET['a']=="query"){
			
			$ntitle='"'.'%'.$_GET['title'].'%'.'"';
			$sql = "select * from news where ntitle like $ntitle";
		}
		else{
			
			$sql = "select * from news";
		}
						$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
		
				$db->query("set names 'gb2312'");
				if ($db->connect_error) {
  			  die("����ʧ��: " . $conn->connect_error);
		}
				
				//׼��һ��SQL���

				/*$sql = "select * from news";*/
				
				//ִ��sql��䣬����ǲ�ѯ��䣬�ɹ����ؽ��������������ǣ��ɹ�ִ��Ϊtrue��ִ��ʧ��Ϊfalse

				/*$reslut =$db->query($sql);
		if($reslut){
			
			echo "<table>";
		}
			while ($attr=$reslut->fetch_row()){				
			
				echo "<tr style='height:200px;'>";
				echo "<td ><img  src=$attr[5] /></td>";
					echo "<td >".$attr[1]."</td>";
				echo "</tr>";
			
			}
			echo "</table>";	*/
		
		
		
		
		
		
		
		
		
		//��ҳ����
		function news($pageNum = 1, $pageSize = 3)
		{
    		$array = array();
    		$coon = mysqli_connect("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
    		mysqli_select_db($coon);
    		mysqli_set_charset($coon, "gb2312");
   			 // limitΪԼ����ʾ��������Ϣ��������������������һ��Ϊ�ӵڼ�����ʼ���ڶ���Ϊ����
		if(isset($_GET['a'])&&$_GET['a']=="query"){
			
			$ntitle='"'.'%'.$_GET['title'].'%'.'"';
			$rs = "select * from news where ntitle like $ntitle limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
		}
   			 else
    		$rs = "select * from news limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    		
   			 $r = mysqli_query($coon, $rs);
    		while ($obj = mysqli_fetch_object($r)) {
      			  $array[] = $obj;
   			 }
   			 mysqli_close($coon);
    		return $array;
		}
		//��ʾ��ҳ���ĺ���
		function allNews()
		{
    		$coon = mysqli_connect("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
			mysqli_select_db($coon);
    		mysqli_set_charset($coon, "gb2312");
		if(isset($_GET['a'])&&$_GET['a']=="query"){
			
			$ntitle='"'.'%'.$_GET['title'].'%'.'"';
			$rs = "select count(*) from news where ntitle like $ntitle";
		}
		else
    		$rs = "select count(*) num from news"; //������ʾ����ҳ��
    		$r = mysqli_query($coon, $rs);
    		$obj = mysqli_fetch_object($r);
   			mysqli_close($coon);
   			return $obj->num;
		}
		@$allNum = allNews();
   		@$pageSize = 3; //Լ��ÿҳ��ʾ����Ϣ����
   		@$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
   		@$endPage = ceil($allNum/$pageSize); //��ҳ��
   		@$array = news($pageNum,$pageSize);
		
		echo '<table id="tableid">';
			foreach($array as $key=>$values){
        		echo "<tr>";
        		echo "<td><img src='{$values->img}' style='width:200px;height:150px'></td>";
        		echo "<td style='cursor:pointer' class='td1' onclick=sendnews($values->nid)>{$values->ntitle}</td>";
        		echo "</tr>";
    		}
    		?>
    		<tr >
    		<td colspan="2" style="font-size:30px;height:200px">
    			<a href="?pageNum=1">��ҳ</a>
   				<a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">��һҳ</a>
   				<a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">��һҳ</a>
   				<a href="?pageNum=<?php echo $endPage?>">βҳ</a>
    		</td>
    		
    		</tr>
    		
    		<?php 
		echo '</table>';
		include 'boot.php';
		echo '</div>';
		
		?>	
		
	<script src="js/banner.js"></script>
	</body>

</html>
<?php
?>