<!DOCTYPE html>
<html>
	<head>
		<meta charset="gb2312">
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<title></title>
		<style>
			body{
				margin:0px;
				padding:0px;
				background:whitesmoke;
			}
			.top{
				float:left;
				width:100%;
				height:40px;
				background: rgb(64, 142, 214);
			}
			.info{
				float:left;
				width:100%;
				height:800px;
				border:1px red solid;
				
			}
			.mcontent {
				position:relative;
				bottom:-55px;
				width: 99%;
				font-size: 14px;
				height: 500px;
				line-height: 1.5;
			}
			.fabu {
				text-decoration: none;
				background: #2f435e;
				color: #f2f2f2;
				position: relative;
				top: 70px;
				padding: 10px 30px 10px 30px;
				font-size: 16px;
				font-family: 微软雅黑, 宋体, Arial, Helvetica, Verdana, sans-serif;
				font-weight: bold;
				border-radius: 3px;
				-webkit-transition: all linear 0.30s;
				-moz-transition: all linear 0.30s;
				transition: all linear 0.30s;
			}
		</style>
	</head>
	<body>
		<div class="top">
			<a  href="index.php" style="color:white; text-decoration:none;"><b>首页</b></a>
		</div>
		<div class="info">
			<div style="width:20%;height:100%;float: left;"></div>
			<div style="width:60%;height:100%;background:white;float:left;text-align:center;">
				<span style="font-size:30px;">发布新闻</span>
				<form action="upload_file.php" method="post" enctype="multipart/form-data" style="position:relative;top:5%;font-size:20px;">
					新闻标题<input type="text" name="title" id="title" style="width: 200px;
    					height: 20px;
    					border-radius: 18px;
    					outline: none;
    					border: 1px solid #ccc;
    					padding-left: 20px;
    					position: relative;"/></br>
    					<label for="file">文件名：</label>
    					<input type="file" name="file" id="file"><br>
    					新闻内容<br />
            <textarea id="editor1" name="context" class="mcontent">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
            <script type="text/javascript">
                CKEDITOR.replace( 'editor1' );
            </script>
    					</br><!--
    				新闻内容<textarea name="context" class="mcontent"></textarea></br>-->
    				<input type="submit" value="Submit" class="fabu" />
    				
				</form>
			</div>
			
			<?php include 'boot.php';?>
		</div>
		
	</body>
</html>

<?php 
    					
						
						
						
				
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
?>