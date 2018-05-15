<?php
session_start();
$variety = $_POST ['variety'];
$date = $_POST ['date'];
$time = $_POST ['time'];
$options = $_POST ['options'];
$description = $_POST ['description'];
$userid = $_SESSION['id'];

if (! $variety || ! $date || !$time || !$options) {
	
	echo "<script type='text/JavaScript'>
    	 alert('All the field are required!');
		</script>";
	$url = "appointment.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query = "insert into appointment set a_variety='".$variety."', a_date='".$date."',a_time='".$time."', a_userid='".$userid."',a_options='".$options."', a_description='".$description."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Appointment Successfully made');
		</script>";
	$url = "user.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	
	echo "<script type='text/JavaScript'>
    	 alert('Make appointment failed!');
		</script>";
	$url = "appointment.html";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="appointment.html";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
