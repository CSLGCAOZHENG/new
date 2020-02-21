<?php


if($do == "upload"){
    upload();
}


function upload(){  
    $extensions = array("jpg","bmp","gif","png");  
    $uploadFilename = $_FILES['upload']['name']; 
    $uploadFilesize = $_FILES['upload']['size'];
    if($uploadFilesize  > 1024*2*1000){
         echo "<font color=\"red\"size=\"2\">*图片大小不能超过2M</font>";  
         exit;
    }

    $extension = pathInfo($uploadFilename,PATHINFO_EXTENSION);  
    if(in_array($extension,$extensions)){  
        $uploadPath ="./uploadfile/";  
        $uuid = str_replace('.','',uniqid("",TRUE)).".".$extension;  
        $desname = $uploadPath.$uuid;  
        $previewname = './uploadfile/'.$uuid;  
        $tag = move_uploaded_file($_FILES['upload']['tmp_name'],$desname);  
        $callback = $_REQUEST["CKEditorFuncNum"];  
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$previewname."','');</script>";  
    }else{  
        echo "<font color=\"red\"size=\"2\">*文件格式不正确（必须为.jpg/.gif/.bmp/.png文件）</font>";  
    }  
}


























$name="";
       if($_FILES["file"]["error"])
       {
           echo $_FILES["file"]["error"];
       }
       else {
           //没有出错
           //加限制条件
           //判断上传文件类型为png或jpg且大小不超过1024000B
           if (($_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/jpeg") && $_FILES["file"]["size"] < 1024000) {
               //防止文件名重复
               $filename = "./newimg/". time() . $_FILES["file"]["name"];
               $name=$filename;
               //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
               $filename = iconv("UTF-8", "gb2312", $filename);
               //检查文件或目录是否存在
               if (file_exists($filename)) {
                   echo "该文件已存在";
               } else {
                   //保存文件,   move_uploaded_file 将上传的文件移动到新位置
                   move_uploaded_file($_FILES["file"]["tmp_name"], $filename);//将临时地址移动到指定地址
                   echo "chenggong";
               }
           } else {
               echo "文件类型不对";
           }
       }
//mysql
session_start();
    					
    					if(empty($_SESSION["user"]))	{
    						header("location:login.php");
    					}	
							
    					else{																								
								//连接数据库
    							echo '<div class="point">';
								//造连接对象：造一个mysql对象
								/*header("content-Type: text/html; charset=gb2312");*/
								$db = new MySQLi("10.18.57.16:3306","H_Z09416202","ab133478","h_z09416202");
								$db->query("set names 'gb2312'");
								if(isset($_POST['title'])){
									$title=1;
									$title=$_POST['title'];
									$context=$_POST['context'];
									$username=$_SESSION["user"];
									$time=date("Y/m/d/g/i/s");
									/*$_FILES["file"]["name"];*/
									echo $title;
									if ($db->connect_error) {
  			  						die("连接失败: " . $conn->connect_error);
									}	
									//准备一条SQL语句*/
									$sql="insert into news (ntitle,context,author,time,img) values('$title','$context','$username','$time','$name')";
									mysqli_query($db,$sql);
									mysqli_close($db);
								}
						
    					}	
    					header("location:./index.php");
						
?>