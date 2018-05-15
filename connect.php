<?php
$db = new mysqli ( "localhost", "root", "", "spm" );
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