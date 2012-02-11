<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp",$con);
mysql_query("INSERT INTO MYCART_MASTER VALUES ('".$_SESSION['customerid']."','".$_GET['prod']."')");
mysql_close($con);
?>