<?php session_start(); ?>
<html>
<head>
<style type="text/css">
body
{
  background-image:url('images/adminback.jpg');
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
#menu th
{
  background-color:CadetBlue;
  color:White;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#menu td
{
  font:14px Calibri,sans-serif;
  text-align:left;
}
#showresult th
{
  background-color:PaleVioletRed;
  color:White;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
  vertical-align:bottom;
}
#showresult td
{
  background-color:Wheat;
  color:Black;
  font:14px Calibri,sans-serif;
  text-align:left;
  vertical-align:top;
}
</style>
</head>
<body>
<center><div id="admin_main">
<div id="titlebar">
Welcome Administrator | My Workplace | <a href="cust_logout.php">Logout</a>
</div>
<div id="pagetitle"><h1>Online Shopping Portal</h1>a creation of XYZ.com</div>
<div id="mainbody">
<table cellspacing="10px" cellpadding="10px">
<tr>
<td width="150px" valign="top">
<div id="menu">
<table cellspacing="0px" cellpadding="5px">
<tr><th>Customer Services</th></tr>
<tr><td><a href="execute_order.php">Execute Orders</a></td></tr>
<tr><td><a href="admin_orderhistory.php">Orders History</a></td></tr>
<tr><th>Inventory Manager</th></tr>
<tr><td><a href="update_stock.php">Update Stock</a></td></tr>
</table>
</div>
</td>
<td width="650px" valign="top">
<div id="showresult">
<fieldset>
<legend><strong>Order History</strong></legend>
<?php 
$con = mysql_connect('localhost','root','');
echo "<table border='1' bordercolor='white' cellpadding='5px' cellspacing='0px'>";
echo "<tr><th>Order Number / <br/>
      Customer / <br/>
	  Order Date</th>
	  <th>Product(s) Ordered</th>
	  <th>Total<br/>Amount<br/>(Rs.)</th>
      <th>Shipping Address</th><th>Status</th>";
echo "</tr>";
if(!$con)
{
  die('could not conect'.mysql_error());
}
mysql_select_db("osp",$con);
$res = mysql_query("SELECT o.order_id, c.custname, o.order_date, o.addrline1,	o.addrline2, o.city, o.state, o.pin, o.phone, o.emailid, o.total, o.ord_status FROM ORDER_MASTER o, CUSTOMER_MASTER c WHERE o.customer = c.custid AND NOT o.ord_status = 'order in process'");
while($row = mysql_fetch_array($res))
{
  
  echo "<tr>
        <td>".$row['order_id']." / <br/>".
		$row['custname']." / <br/>".
		$row['order_date']." </td><td>";
  $res1 = mysql_query("SELECT p.pcompany, p.pname, o.quantity FROM PRODUCT_MASTER p, ORDER_DETAIL o WHERE o.product = p.prodid AND o.order = '".$row['order_id']."'");
  while($row1 = mysql_fetch_array($res1))
  {
    echo $row1['pcompany']." ".$row1['pname']." - ".$row1['quantity']." pcs<br/>";      
  }
  echo "</td>";
  echo "<td>".$row['total']."</td>";
  echo "<td>".
        $row['addrline1']."<br/>".
		$row['addrline2']."<br/>".
		$row['city']."<br/>".
		$row['state']." - ".
		$row['pin']."<br/>Phone - ".
		$row['phone']."<br/>".
		$row['emailid']."<br/>".
		"</td>";
  echo "<td>".$row['ord_status']."</td>";
  echo "</tr>";
}
echo "</table>";
?>
</fieldset>
</div>
</td>
</tr>
</table>
</div>
</div></center>
</body>
</html>