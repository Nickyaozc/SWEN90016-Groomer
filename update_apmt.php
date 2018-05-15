<?php
session_start();
$variety = $_POST ['variety'];
$date = $_POST ['date'];
$time = $_POST ['time'];
$options = $_POST ['options'];
$description = $_POST ['description'];
$userid = $_SESSION['id'];
$apmt_id = $_POST['apmt_id'];

if (! $variety || ! $date || !$time || !$options) {
	
	echo "<script type='text/JavaScript'>
    	 alert('All the field are required!');
		</script>";
	$url = "re_schedule.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query = "update appointment set a_variety='".$variety."', a_date='".$date."',a_time='".$time."', a_userid='".$userid."',a_options='".$options."', a_description='".$description."' where Id='".$apmt_id."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Appointment Successfully re-scheduled');
		</script>";
	$url = "user.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	
	echo "<script type='text/JavaScript'>
    	 alert('Re-scheduled appointment failed!');
		</script>";
	$url = "re-schedule.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="user.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
