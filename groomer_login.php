<?php
$name = $_POST ['name'];
$password = $_POST ['password'];
if ((! isset ( $name )) || (! isset ( $password ))) {
} else {
	$mysql = mysqli_connect ( "localhost", "root", "root" );
	if (! $mysql) {
		echo "连接数据库失败";
		exit ();
	}
	$selected = mysqli_select_db ( $mysql, "student" );
	if (! $selected) {
		echo "输入信息错误！";
		exit ();
	}
	$query = "select count(*) from sinfo where sid = '" . $name . "' and password = '" . $password . "'";
	$result = mysqli_query ( $mysql, $query );
	if (! $result) {
		// echo "找不到相应的学生！";
		echo "<script type='text/JavaScript'>
    	 alert('找不到相应的学生！');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
		exit ();
	}
	$row = mysqli_fetch_row ( $result );
	$count = $row [0];
	if ($count > 0) {
		// $url = "student_index.php?sid = " . $name . "";
		setcookie('mycookie',$name);//通过cookie传递sid
		$url = "student_index.php?";
		echo "<script type='text/javascript'>" . "location.href='" . $url . "'" . "</script>";
	} else {
		echo "<script type='text/JavaScript'>
    	 alert('用户名或密码错误！');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
	}
}

?>