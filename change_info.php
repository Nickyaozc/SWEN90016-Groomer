<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<?php
if(empty($sid)){
	$sid = $_COOKIE['mycookie'];
}
$db = new mysqli ( "localhost", "root", "root", "student" );
$db->query ( "set names utf8" );
if (mysqli_connect_errno ()) {
	echo "�������ݿ�ʧ��";
}

?>
<body>
	<center>
		<h1>�޸�ѧ����Ϣ</h1>
		<!-- <form name="form" onsubmit="CheckPwd()" action="register.php" -->
		<form name="form" action="change_check.php" method="post">
			<table width="400" height="200" border="1" align="center">
				<tr>
					<th colspan="2">ѧ����Ϣ</th>
				</tr>
				<tr>
					<td align="center">ѧ��ѧ��:</td>
					<td align="center"><input type="text" name="sid" value="<?php echo $sid?>" readonly></td>
				</tr>
				<tr>
					<td align="center">ѧ���ɼ�:</td>
					<td align="center"><input type="text" name="sscore"></td>
				</tr>
				<tr>
					<td align="center">�û�����:</td>
					<td align="center"><input type="password" name="password1"></td>
				</tr>
				<tr>
					<td align="center">ȷ������:</td>
					<td align="center"><input type="password" name="password2"></td>
				</tr>
				<tr>
					<td align="center">ѧ���༶:</td>
					<td align="center"><select name="sclass">
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
					</select>
				
				</tr>
				<tr>
					<td align="right" colspan="2">��Ȥ���ã� <input type='checkbox'
						name='interest[]' value='JAVA' checked="checked"> JAVA <input
						type='checkbox' name='interest[]' value='C++'> C++ <input
						type='checkbox' name='interest[]' value='PHP'> PHP <input
						type='checkbox' name='interest[]' value='����'> ����
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2"><input type="submit" value="�ύ" /> <input
						type="reset" value="����" /></td>
				</tr>
			</table>
		</form>
	</center>
</body>


</html>
