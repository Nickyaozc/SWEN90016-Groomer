<?php
$name = $_POST ['name'];
$password = $_POST ['password'];
if ((! isset ( $name )) || (! isset ( $password ))) {
} else {
	$mysql = mysqli_connect ( "localhost", "root", "root" );
	if (! $mysql) {
		echo "�������ݿ�ʧ��";
		exit ();
	}
	$selected = mysqli_select_db ( $mysql, "student" );
	if (! $selected) {
		echo "������Ϣ����";
		exit ();
	}
	$query = "select count(*) from sinfo where sid = '" . $name . "' and password = '" . $password . "'";
	$result = mysqli_query ( $mysql, $query );
	if (! $result) {
		// echo "�Ҳ�����Ӧ��ѧ����";
		echo "<script type='text/JavaScript'>
    	 alert('�Ҳ�����Ӧ��ѧ����');
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
		setcookie('mycookie',$name);//ͨ��cookie����sid
		$url = "student_index.php?";
		echo "<script type='text/javascript'>" . "location.href='" . $url . "'" . "</script>";
	} else {
		echo "<script type='text/JavaScript'>
    	 alert('�û������������');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
	}
}

?>