<?php
session_start();
$con = mysql_connect("localhost","root","");
if(!con)
{
  die('could not connect'.mysql_error());
}
mysql_select_db("osp",$con);
$res = mysql_query("SELECT p.pstock,o.product, o.quantity FROM ORDER_DETAIL o, PRODUCT_MASTER p WHERE o.product = p.prodid AND o.order = '".$_POST['order']."'");
while($res1 = mysql_fetch_array($res))
{
  $diff = $res1['pstock'] - $res1['quantity'];
  mysql_query("UPDATE PRODUCT_MASTER SET pstock = ".$diff." WHERE prodid= '".$res1['product']."'");
}  
mysql_query("UPDATE ORDER_MASTER SET ord_status='shipped' WHERE order_id = '".$_POST['order']."'");
//mysql_query("UPDATE ORDER_MASTER SET reason='".$_GET['reason']."' WHERE order_id = '".$_GET['order']."'");
mysql_close($con);
header('Location:execute_order.php');
?>