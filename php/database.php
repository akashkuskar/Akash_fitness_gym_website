con.php
<?php 
$con=mysql_connect('localhost','root');
mysql_select_db('airline',$con);
if($con){echo"working"}
else{echo "not working"}
?>