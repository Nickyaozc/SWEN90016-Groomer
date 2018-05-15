<?php
$email = $_POST ['email'];
$password = $_POST ['password'];
if ((! isset ( $email )) || (! isset ( $password ))) {
} else {
	require_once"connect.php";
	$query = "select * from admin where username = '" . $email ."'";
	$result = $db->query ( $query );
	if (! $result) {
		echo "<script type='text/JavaScript'>
    	 alert('Wrong username or password');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
		exit ();
	}
	$re = mysqli_fetch_array ( $result );
	if ($re['password']==$password) {
		// session_register("name");
		// session_register("pwd");
		// $_SESSION['name']=$logname;
		// $_SESSION['userid']=$re['userid'];
		echo"<meta http-equiv='refresh' content='0; url=index.html' />";
	} else {
		echo "Wrong username or password";
		echo"<meta http-equiv='refresh' content='3; url=login.html' />";
	}
}

?>