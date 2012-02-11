<?php
$con = mysql_connect("localhost","root","");
if(!con)
{
  die('could not connect'.mysql_error());
}
mysql_select_db("osp",$con);
mysql_query("UPDATE ORDER_MASTER SET ord_status='order rejected' WHERE order_id = '".$_POST['order']."'");
//mysql_query("UPDATE ORDER_MASTER SET reason='".$_GET['reason']."' WHERE order_id = '".$_GET['order']."'");
mysql_close($con);
header('Location:execute_order.php');
?>