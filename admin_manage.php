<?php
$db = new mysqli ( "localhost", "root", "root", "student" );
if (mysqli_connect_errno ()) {
	echo "连接数据库失败!";
}
$query = "select *  from sinfo ";
$result = $db->query ( $query );
$num_result = $result->num_rows;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员操作界面</title>
</head>
<body>
	<center>
		<h1>欢迎管理员使用本系统！</h1>
		<br><br>
		<form name="form1" method="post" action="admin_search.php">
		请输入要查询学生的学号：<input type="text" name="sid">
		<input type="submit" value="查询" />
		
		<br><br><br><br>
			<table width="600" border="1" align="center">
				<tr>
					<td align="center">学号</td>
					<td align="center">姓名</td>
					<td align="center">成绩</td>
					<td align="center">班级</td>
					<td align="center">性别</td>
					<td align="center">兴趣爱好</td>
					<td align="center">操作</td>
				</tr><?php
				
				for($i = 0; $i < $num_result; $i ++) {
					$row = $result->fetch_assoc (); // 函数从结果集中取得一行作为关联数组
					?>
  <tr>
					<td align="center"><?php  $sid = $row['sid'];echo $sid;?></td>
					<td align="center"><?php echo $row['sname'];?></td>
					<td align="center"><?php echo $row['sscore'];?></td>
					<td align="center"><?php echo $row['sclass'];?></td>
					<td align="center"><?php echo $row['sex'];?></td>
					<td align="center"><?php echo $row['interest'];?></td>
					<td align="center"><a href="<?php echo "delete.php?sid=".$sid ?>">删除</a></td>
				</tr>
	<?php
				}
				$db->close ();
				?>
</table>
		</form>
		<br><br>
		<td align="center"><a href="login.html">退出</a></td>
	</center>
	>
</body>
</html>