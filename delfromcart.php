<?php
session_start();
$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
mysql_query("DELETE FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."' AND product = '".$_GET['prod']."'");
mysql_close($con);
?>