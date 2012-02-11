<?php session_start(); ?>
<html>
<head>
<style type="text/css">
body
{
  background-image:url('images/custback.jpg');
}
#admin_main
{
  background-color:White;
  width:900px;
  box-shadow: 10px 10px 5px #888888;
  padding:10px 10px 10px 10px;
}
#titlebar
{
  text-align:right;
  padding:10px 10px 10px 10px;
  font:12px Calibri,sans-serif ;
}
#pagetitle
{
  text-align:left;
  font:15px Batang;
  padding:25px 25px 25px 25px;
  color:Grey;
}
#mainbody
{
  box-align:Left;
  font:14px Calibri,sans-serif;
  margin:2px 2px 2px 2px;
}
#visitormenu th
{
  background-color:Crimson;
  color:White;
  width:250px;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#order th
{
  background-color:Chocolate;
  color:White;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
  vertical-align:bottom;
  
}
#order td
{
  background-color:DarkSeaGreen;
  color:Black;
  font:14px Calibri,sans-serif;
  text-align:left;
  vertical-align:top;
}
#visitormenu td
{
  text-align:left;
  font:14px Calibri,sans-serif ;
}
</style>
</head>
<body>
<center>
<div id="admin_main">
<div id="titlebar">
Welcome 
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$result = mysql_query("SELECT custname FROM CUSTOMER_MASTER WHERE custid = '".$_SESSION['customerid']."'");
$row = mysql_fetch_array($result);
echo $row['custname'];
//mysql_close($con);
?>
 | <a href="customer_home.php">Home</a> | <a href="go_shopping.php">Go Shopping</a> | 
 <?php
 $res = mysql_query("SELECT COUNT(*) 'COUNT' FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."'");
 $count = mysql_fetch_array($res);
 echo "<a href=\"mycart_home.php\">MY CART</a> ( ".$count['COUNT']." item )";
 ?>
  | Order History | <a href="cust_logout.php">Logout</a> 
</div>
<div id="pagetitle">
<h1>Online Shopping Portal</h1>a creation of XYZ.com
</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td width="600px" valign="top">
<div id='order'>
<fieldset>
<legend><strong>Orders placed in the Past</strong></legend>
<?php
$res = mysql_query("SELECT * FROM ORDER_MASTER WHERE customer = '".$_SESSION['customerid']."'");
echo "<table border='1' bordercolor='white' cellspacing='0px' cellpadding='5px'><tr>";
echo "<th>Transaction<BR/>Number /<br/>Order Date</th><th>Items Ordered</th><th>Bill<br/>Amount<br/>(Rs.)</th><th>Status</th><th>Order Review</th></tr>";
while($ord = mysql_fetch_array($res))
{
  echo "<tr>";
  echo "<td>".$ord['order_id']." / <br/>".$ord['order_date']."</td>";
  $res1=mysql_query("SELECT p.pcompany, p.pname, o.quantity FROM PRODUCT_MASTER p, ORDER_DETAIL o WHERE p.prodid = o.product AND o.order = '".$ord['order_id']."'");
  $i = 1;
  echo "<td><table>";
  while($ord1 = mysql_fetch_array($res1))
  {
    echo "<tr>";
	echo "<td>".$i.".</td>";
	echo "<td>".$ord1['pcompany']." ".$ord1['pname']."</td>";
	echo "<td>-</td>";
	echo "<td>".$ord1['quantity']." pcs</td>";
	echo "</tr>";
  }
  echo "</table></td>";
  echo "<td>Rs.".$ord['total']."</td>";
  echo "<td>".$ord['ord_status']."</td>";
  echo "<td>".$ord['reason']."</td>";
  echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>
</fieldset>
</div>
</td>
<td width="250px" valign="top">
<div id="visitormenu">
<table cellspacing="5px" cellpadding="5px">
<tr><th>OSP Services</th></tr>
<tr><td><a href="customer_home.php">My Account</a></td></tr>
<tr><td><a href="go_shopping.php">Go Shopping !!!</a></td></tr>
<tr><td><a href="order_history.php">My Cart ( <?php echo $count['COUNT'] ?> ) items</a></td></tr>
<tr><td><a href="order_history.php">Order History</a></td></tr>
</table>
</div>
</td>
</tr>
</table>
</div>
</div>
</center>
</body>
</html>