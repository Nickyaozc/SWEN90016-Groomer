<?php
session_start();
$user_id = $_GET['user_id'];
require_once "connect.php";
$delete_apmt = "delete from appointment where a_userid='".$user_id."'";
$delete_dog = "delete from dinfo where d_ownerid='".$user_id."'";
$delete_user = "delete from uinfo where Id='".$user_id."'";
$apmt = $db->query ( $delete_apmt );
$dog = $db->query ( $delete_dog );
$user = $db->query ( $delete_user );

if ($apmt && $dog && $user) {
	
	echo "<script type='text/JavaScript'>
    	 alert('User Successfully deleted');
		</script>";
	$url = "groomer.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	
	echo "<script type='text/JavaScript'>
    	 alert('Delete user failed!');
		</script>";
	$url = "groomer.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="groomer.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
