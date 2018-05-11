<?php
$name = $_POST ['name'];
$e_mail = $_POST ['e_mail'];
$password = $_POST ['password1'];
$password2 = $_POST ['password2'];
$address = $_POST ['address'];
$state = $_POST ['state'];
$postcode = $_POST ['postcode'];
$mobile_number = $_POST ['mobile_number'];
$home_number = $_POST ['home_number'];
$work_number= $_POST ['work_number'];
$dog_name= $_POST ['dog_name'];
$breed = $_POST ['breed'];
$date_of_birth = $_POST ['date_of_birth'];




$hobby = "";
for($i = 0; $i < count($_POST['interest']); $i++){
	//echo $_POST['interest'][$i];
	$interest[$i] = $_POST['interest'][$i];
}

// foreach($interest as $value) {
// 	$hobby = $hobby.$value.".";
// }
// //echo $sid." ".$sname." ".$sscore." ".$password." ".$password2." ".$sclass." ".$sex;

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

else if (! $sid || ! $sname || ! $sscore || ! $password || ! $sclass || ! $sex) {
	echo "<script type='text/JavaScript'>
    	 alert('All the filed are required!');
		</script>";
	$url = "register.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db = new mysqli ( "localhost", "root", "root", "student" );
$db->query("set names utf8");
if (mysqli_connect_errno ()) {
	echo "<script type='text/JavaScript'>
    	 alert('Unable to connect to database');
		</script>";
	$url = "register.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
//$query = "insert into sinfo values('" . $sid . "','" . $sname . "','" . $sscore . "','" . $password . "','" . $sclass . "','" . $sex . "');";
$query = "insert into sinfo values('" . $sid . "','" . $sname . "','" . $sscore . "','" . $password . "','" . $sclass . "','" . $sex . "','" . $hobby . "');";
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

$url="http://localhost/student/login.html";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
