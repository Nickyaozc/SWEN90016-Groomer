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
//�����ú�Ϊһ����
foreach($interest as $value) {
	$hobby = $hobby.$value.".";
}
//�ж�����
if ($password != $password2) {
	//echo "�����������벻ͬ��";
	echo "<script type='text/JavaScript'>
    	 alert('�����������벻ͬ��');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
//�жϷ����Ƿ���Ч
else if($sscore<0 || $sscore>100){
	//echo "��������Ч�ķ���(0-100)��";
	echo "<script type='text/JavaScript'>
    	 alert('��������Ч�ķ���(0-100)��');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
//�ж���Ϣ�Ƿ�����
else if (! $sid || ! $sscore || ! $password || ! $sclass ) {
	//echo "������������Ϣ��";
	echo "<script type='text/JavaScript'>
    	 alert('������������Ϣ��');
		</script>";
	$url = "change_info.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db = new mysqli ( "localhost", "root", "root", "student" );
if (mysqli_connect_errno ()) {
	//echo "���ݿ����Ӵ���";
	echo "<script type='text/JavaScript'>
    	 alert('���ݿ����Ӵ���');
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
    	 alert('�޸ĳɹ�������ת����½���档');
		</script>";
	$url = "login.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	
} else {
	echo "<script type='text/JavaScript'>
    	 alert('�޸�ʧ�ܣ�������ҳ');
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
