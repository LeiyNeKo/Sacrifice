<html>
<head>
<title>文件上传</title>
<meta lang="zh-CN" charset="utf-8">
</head>
<body>
<center><br><br><br>
<form method="POST">
文件名:<input name="name" type="text"><br>
内容:&#60;?php include("./img/Flag.jpg");?><br><br>
<input value="上传" type="submit">
</form>
</center>
</body>
</html>

<?php
if(isset($_POST['name'])){
	$name=escapeshellcmd($_POST['name']);
	if(preg_match('/(ph)|(ht)/i',$name)) echo '<script>alert("已报警");</script>';
	else{
		$path=exec('find ./ -name '.$name);
		if($path==NULL) file_put_contents($name,'<?php include("./img/Flag.jpg");?>');
		else{
			file_put_contents(str_replace($name,rand(0,100).$name,$path),'<?php include("./img/Flag.jpg");?>');
			echo '<script>alert("有重名文件，已自动修改名称");</script>';
		}
	}
}
highlight_file(__FILE__);
?>
