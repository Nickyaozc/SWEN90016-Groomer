<?php
session_start();
$apmt_id = $_GET['apmt_id'];
require_once"connect.php";
$query = "delete from appointment where Id='".$apmt_id."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Appointment Successfully deleted');
		</script>";
	$url = "user.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	
	echo "<script type='text/JavaScript'>
    	 alert('Delete appointment failed!');
		</script>";
	$url = "user.php";
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
