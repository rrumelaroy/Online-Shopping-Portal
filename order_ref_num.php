<?php 
session_start();
if($_POST['tempval']==1)
{
  header('Location:shipping_add_form.php');
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
     do
     {
        $id="ord".rand(1,999999);
		$res=mysql_query("SELECT order_id FROM ORDER_MASTER WHERE order_id = '".$id."'");
		if(mysql_fetch_array($res))
		{
		  $id="";
		}
     }while($id=="");
	 $stock1 = mysql_query("SELECT p.prodid, p.prodprice FROM PRODUCT_MASTER p, MYCART_MASTER m WHERE p.prodid = m.product AND m.customer = '".$_SESSION['customerid']."'");
	 $i = 0;
	 $grandtotal = 0;
	 $i = 0;
	 while($stock2 = mysql_fetch_array($stock1))
	 {
	   mysql_query("INSERT INTO ORDER_DETAIL VALUES ('".$id."','".$stock2['prodid']."','".$_SESSION['quantity'][$i]."')");
	   $grandtotal = $grandtotal + ( $stock2['prodprice'] * $_SESSION['quantity'][$i]);
	   $i = $i + 1;
	 }
	 $grandtotal = $grandtotal + 50;
	 $dt = getdate(date("U"));
	 $sql = "INSERT INTO ORDER_MASTER VALUES ('".$id."','".$_SESSION['customerid']."','".$_POST['line1']."','".$_POST['line2']."','".$_POST['city']."','".$_POST['state']."','".$_POST['pin']."','".$_POST['phone']."','".$_POST['emailadd']."','".$grandtotal."','50','order in process','','$dt[mday]/$dt[mon]/$dt[year]')";
     if (!mysql_query($sql,$con))
     {
       die('Error: ' . mysql_error());
     }
	 mysql_query("DELETE FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."'");
	 header('Location:order_history.php');
?>
<html>
<head>
<style type="text/css">
#titlebar
{
   text-align:right;   
}
#pagetitle
{
   text-align:center;
   font-size:40px;
}
</style>
</head>
<body>
<div id="titlebar">
Welcome 
<?php
$result = mysql_query("SELECT custname FROM CUSTOMER_MASTER WHERE custid = '".$_SESSION['customerid']."'");
$row = mysql_fetch_array($result);
echo $row['custname'];
//mysql_close($con);
?>
 | <a href="customer_home.php">Home</a> | <a href="go_shopping.php">Go Shopping</a> | 
 <?php
 $res = mysql_query("SELECT COUNT(*) 'COUNT' FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."'");
 $count = mysql_fetch_array($res);
 echo "MY CART ( ".$count['COUNT']." item )";
 ?>
  | <a href="order_history.php">Order History</a> | <a href="cust_logout.php">Logout</a> | Help
</div>
<div id="pagetitle">
TRANSACTION DETAILS PAGE
</div>
<?php
    echo $stock2;
    echo "<h1>Your Order Reference Number is ".$id."</h1>";	
  mysql_close($con);
  ?><a href="order_history.php">Click to see all your Order History >></a></body></html>