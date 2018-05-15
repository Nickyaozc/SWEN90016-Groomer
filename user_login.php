<?php
session_start();
$email = $_POST ['email'];
$password = $_POST ['password'];
if ((! isset ( $email )) || (! isset ( $password ))) {
} else {
	require_once"connect.php";
	$query = "select * from uinfo where u_email = '" . $email ."'";
	$result = $db->query ( $query );
	if (! $result) {
		echo "<script type='text/JavaScript'>
    	 alert('Wrong email or password');
		</script>";
		$url = "login.html";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
		exit ();
	}
	$re = mysqli_fetch_array ( $result );
	if ($re['u_password']==$password) {
		
		$_SESSION['id']=$re['Id'];
		echo"<meta http-equiv='refresh' content='0; url=user.php' />";
	} else {
		echo "Wrong email or password";
		echo"<meta http-equiv='refresh' content='3; url=index.html' />";
	}
}

?>