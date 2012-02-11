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
<script type="text/javascript">
function setproduct($id)
{
  var x=document.$id.quantity.value;
  if(x.length==0||isNaN(parseInt(x)))
    return false;
  else
    return true;  
}
</script>
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
<legend><strong>Order Processing Section</strong></legend>
<?php 
$con = mysql_connect('localhost','root','');
echo "<table border='1' bordercolor='white' cellpadding='5px' cellspacing='0px'>";
echo "<tr><th>Product</th>
	  <th>Category</td>
	  <th>Current Stock</th><th>Enter stock Value</th>
      <th>Action to be<br/>performed</td>";
echo "</tr>";
if(!$con)
{
  die('could not conect'.mysql_error());
}
mysql_select_db("osp",$con);
$res = mysql_query("SELECT prodid, pcompany, pcatagory, pname, pstock FROM PRODUCT_MASTER");
while($row = mysql_fetch_array($res))
{
  
  echo "<tr>";
  echo "<td>".$row['pname']." ".$row['pcompany']." </td>";
  echo "<td>".$row['pcatagory']."</td>";
  echo "<td>".$row['pstock']."</td>";
  echo "<td>";
  echo "<form name='".$row['prodid']."' method='post' action='update_stockaction.php' onsubmit='return setproduct(".$row['prodid'].")'>";
  echo "<input type='hidden' name='product' value='".$row['prodid']."'>";
  echo "<input type='text' name='quantity' maxlength='5' length='5'></td><td>";
  echo "<button type='submit'>Update stock</button></form></td>";
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