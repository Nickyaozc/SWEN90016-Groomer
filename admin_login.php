<?php
$name = $_POST['name'];
$password = $_POST['password'];
if((!isset($name)) || (!isset($password)))
{
}
else
{
	$mysql = mysqli_connect ("localhost","root","root");
	if(!$mysql)
	{
		echo "Unable to connect to database";
		exit;
	}
	$selected = mysqli_select_db($mysql,"student");
	if(!$selected)
	{
		echo "No user in database";
		exit;
	}
	$query = "select count(*) from admin where name = '".$name."' and password = '".$password."'";
	$result = mysqli_query($mysql,$query);
	if(!$result)
	{
		echo "Inccorect password";
		exit;
	}
	$row = mysqli_fetch_row($result);
	$count = $row[0];
	if($count > 0)
	{
		$url = "admin_manage.php";
		echo "<script type='text/javascript'>"."location.href='".$url."'"."</script>";
	}
	else
	{
		echo "<script type='text/JavaScript'>
    	 alert('Successful logging in!');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
	}
}

?>
