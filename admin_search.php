<?php
$sid = $_POST ['sid'];
$db = new mysqli ( "localhost", "root", "root", "student" );
if (mysqli_connect_errno ()) {
	echo "�������ݿ�ʧ��!";
}
$query = "select *  from sinfo where sid = '" . $sid . "';";
$result = $db->query ( $query );
$num_result = $result->num_rows;
if(!$num_result){
	echo "<script type='text/JavaScript'>
    	 alert('�����ڸ�ѧ����');
		</script>";
	$url = "admin_manage.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����Ա��������</title>
</head>
<body>
	<center>
		<h1>��ѯ�����</h1>
		<br><br><br><br>
		<form name="form1" method="post">
			<table width="600" border="1" align="center">
				<tr>
					<td align="center">ѧ��</td>
					<td align="center">����</td>
					<td align="center">�ɼ�</td>
					<td align="center">�༶</td>
					<td align="center">�Ա�</td>
					<td align="center">��Ȥ����</td>
					<td align="center" colspan="2">����</td>
				</tr><?php
				
				for($i = 0; $i < $num_result; $i ++) {
					$row = $result->fetch_assoc (); // �����ӽ������ȡ��һ����Ϊ��������
					?>
  <tr>
					<td align="center"><?php  $sid = $row['sid'];echo $sid;?></td>
					<td align="center"><?php echo $row['sname'];?></td>
					<td align="center"><?php echo $row['sscore'];?></td>
					<td align="center"><?php echo $row['sclass'];?></td>
					<td align="center"><?php echo $row['sex'];?></td>
					<td align="center"><?php echo $row['interest'];?></td>
					<td align="center"><a href="<?php echo "delete.php?sid=".$sid ?>">ɾ��</a></td>
					
				</tr>
				
	<?php
				}
				$db->close ();
				?>
				<br><br><br>
</table>
		</form>
		<br><br>
		<td align="center"><a href="admin_manage.php">����</a></td>
	</center>
</body>
</html>