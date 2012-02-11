<?php session_start();
$con = mysql_connect('localhost','root','');
if(!$con)
{
  die('could not connect'.mysql_error());
}
mysql_select_db('osp',$con);
mysql_query("UPDATE PRODUCT_MASTER SET pstock = ".$_POST['quantity']." WHERE prodid = '".$_POST['product']."'");
mysql_close($con);
header('Location:update_stock.php');
?>