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
	echo "连接数据库失败";
}

?>
<body>
	<center>
		<h1>修改学生信息</h1>
		<!-- <form name="form" onsubmit="CheckPwd()" action="register.php" -->
		<form name="form" action="change_check.php" method="post">
			<table width="400" height="200" border="1" align="center">
				<tr>
					<th colspan="2">学生信息</th>
				</tr>
				<tr>
					<td align="center">学生学号:</td>
					<td align="center"><input type="text" name="sid" value="<?php echo $sid?>" readonly></td>
				</tr>
				<tr>
					<td align="center">学生成绩:</td>
					<td align="center"><input type="text" name="sscore"></td>
				</tr>
				<tr>
					<td align="center">用户密码:</td>
					<td align="center"><input type="password" name="password1"></td>
				</tr>
				<tr>
					<td align="center">确认输入:</td>
					<td align="center"><input type="password" name="password2"></td>
				</tr>
				<tr>
					<td align="center">学生班级:</td>
					<td align="center"><select name="sclass">
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
					</select>
				
				</tr>
				<tr>
					<td align="right" colspan="2">兴趣爱好： <input type='checkbox'
						name='interest[]' value='JAVA' checked="checked"> JAVA <input
						type='checkbox' name='interest[]' value='C++'> C++ <input
						type='checkbox' name='interest[]' value='PHP'> PHP <input
						type='checkbox' name='interest[]' value='其他'> 其他
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2"><input type="submit" value="提交" /> <input
						type="reset" value="重置" /></td>
				</tr>
			</table>
		</form>
	</center>
</body>


</html>
