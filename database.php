<?php
$db = mysqli_connect("localhost","root","","ssb275");
if($db){
	//echo "Server Connection Established";
}
else{
	die("Mysql Connection Error".mysqli_error($db));
}
?>