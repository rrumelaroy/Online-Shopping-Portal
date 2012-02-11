<?php session_start(); 
if(!isset($_SESSION['admin']))
  header('Location:default.php');
?>
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
<tr><td><a href='update_stock.php'>Update Stock</a></td></tr>
</table>
</div>
</td>
<td width="650px" valign="top">
<div id="showresult">
</div>
</td>
</tr>
</table>
</div>
</div></center>
</body>
</html>