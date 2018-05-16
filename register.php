<?php
$name = $_POST ['name'];
$email = $_POST ['e_mail'];
$password = $_POST ['password1'];
$password2 = $_POST ['password2'];
$address = $_POST ['address'];
$state = $_POST ['state'];
$postcode = $_POST ['postcode'];
$mobile = $_POST ['mobile_number'];
$home_number = $_POST ['home_number'];
$work_number= $_POST ['work_number'];

if ($password != $password2) {

	echo "<script type='text/JavaScript'>
    	 alert('Please input the same password twice!');
		</script>";
	$url = "register.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}

else if (! $name || ! $email || ! $password || ! $state || ! $postcode) {
	echo "<script type='text/JavaScript'>
    	 alert('All the fields are required!');
		</script>";
	$url = "register.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query = "insert into uinfo set u_name='".$name."',u_password='".$password."',u_email='".$email."',u_address='".$address."',u_state='".$state."',u_mobile='".$mobile."',u_homenumber='".$home_number."',u_worknumber='".$work_number."',u_postcode='".$postcode."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Successfully registed');
		</script>";
	$url = "login.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	echo "<script type='text/JavaScript'>
    	 alert('Register failed!s');
		</script>";
	$url = "register.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="index.html";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
