<?php
session_start();
$variety = $_POST ['variety'];
$date = $_POST ['date'];
$time = $_POST ['time'];
$options = $_POST ['options'];
$description = $_POST ['description'];
$dogname = $_POST['dogname'];
$userid = $_SESSION['id'];

if (! $variety || ! $date || !$time || !$options || !$dogname) {
	
	echo "<script type='text/JavaScript'>
    	 alert('All the field are required!');
		</script>";
	$url = "appointment.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query_d = "select Id from dinfo where d_ownerid='".$_SESSION['id']."' and d_name='".$dogname."'";
$results_d = $db->query ( $query_d );
$re_d = mysqli_fetch_array ( $results_d );
$dogid = $re_d['Id'];
$query = "insert into appointment set a_variety='".$variety."', a_date='".$date."',a_time='".$time."', a_userid='".$userid."',a_options='".$options."', a_description='".$description."', a_dogid='".$dogid."'";

$results = $db->query ( $query );

if ($results) {
	$mail_subject = "A new appointment made by user: ".$userid;
	$mail_msg = "Date: ".$date."\nTime: ".$time."\nOptions: ".$options."\nVariety: ".$variety."\nDescription: ".$description;
	mail("px.lin1@gmail.com",$mail_subject,$mail_msg);
		// echo "<script type='text/JavaScript'>
	 //    	 alert('Appointment Successfully made');
		// 	</script>";
		// $url = "user.php";
		// echo "<script language=\"javascript\">";
		// echo "location.href=\"$url\"";
		// echo "</script>";

	} else {
		
		echo "<script type='text/JavaScript'>
	    	 alert('Make appointment failed!');
			</script>";
		$url = "appointment.php";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
		exit ();
	}
$db->close ();

$url="appointment.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
// echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
