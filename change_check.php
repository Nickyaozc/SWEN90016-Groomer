<?php
$sid = $_POST ['sid'];
$sscore = $_POST ['sscore'];
$password = $_POST ['password1'];
$password2 = $_POST ['password2'];
$sclass = $_POST ['sclass'];
$hobby = "";
for($i = 0; $i < count($_POST['interest']); $i++){
	$interest[$i] = $_POST['interest'][$i];
} 
//将爱好合为一个串
foreach($interest as $value) {
	$hobby = $hobby.$value.".";
}
//判断密码
if ($password != $password2) {
	//echo "两次密码输入不同！";
	echo "<script type='text/JavaScript'>
    	 alert('两次密码输入不同！');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
//判断分数是否有效
else if($sscore<0 || $sscore>100){
	//echo "请输入有效的分数(0-100)！";
	echo "<script type='text/JavaScript'>
    	 alert('请输入有效的分数(0-100)！');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
//判断信息是否完整
else if (! $sid || ! $sscore || ! $password || ! $sclass ) {
	//echo "请完整输入信息！";
	echo "<script type='text/JavaScript'>
    	 alert('请完整输入信息！');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db = new mysqli ( "localhost", "root", "root", "student" );
if (mysqli_connect_errno ()) {
	//echo "数据库连接错误！";
	echo "<script type='text/JavaScript'>
    	 alert('数据库连接错误！');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->query("set names utf8");
$query = "update sinfo set sscore='" . $sscore . "',password='" . $password . "',sclass='" . $sclass . "',interest='" . $hobby . "'where sid = '" . $sid . "';";
$result = $db->query ( $query );
if ($result) {
	echo "<script type='text/JavaScript'>
    	 alert('修改成功！将跳转到登陆界面。');
		</script>";
	$url = "login.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	
} else {
	echo "<script type='text/JavaScript'>
    	 alert('修改失败！返回主页');
		</script>";
	$url="http://localhost/student/login.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();
$url="http://localhost/student/login.html";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
