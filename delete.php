<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<?php
$sid = $_GET ["sid"];
$db = new mysqli ( "localhost", "root", "root", "student" );
$db->query("set names utf8");
if (mysqli_connect_errno ()) {
	echo "�������ݿ�ʧ��";
}

//$mysql->query ( "delete from sinfo where sid = '" . $sid . "';" );
$query = "delete from sinfo where sid = '" . $sid . "';" ;
$result = $db->query ( $query );
if ($result) {
	?>
<script language="javascript">
alert("ɾ���ɹ�");
</script>
<?php
} else {
	?>
<script language="javascript">
alert("ɾ��ʧ��");
</script>}
<?php
}
$url="http://localhost/student/admin_manage.php";
echo "<script language=\"javascript\">";
echo "location.href=\"$url\"";
echo "</script>";
?>
<body>
</body>
</html>
