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
#head
{
  background-color:SeaGreen;
  color:White;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#row
{
  background-color:Moccasin;
  color:Black;
  font:14px Calibri,sans-serif;
  text-align:left;
}
#row1
{
  background-color:Moccasin;
  color:Black;
  font:14px Calibri,sans-serif;
  text-align:right;
}
#visitormenu td
{
  text-align:left;
  font:14px Calibri,sans-serif ;
}
</style>
<script type="text/javascript">
function delproduct(id)
{
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET","delfromcart.php?prod="+id,true);
  xmlhttp.send();
  window.location.reload();
}
</script>
</head>
<BODY>
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
 | <a href="customer_home.php">My Account</a> | <a href="go_shopping.php">Go Shopping</a> | 
<?php
 $res = mysql_query("SELECT COUNT(*) 'COUNT' FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."'");
 $count = mysql_fetch_array($res);
 echo "MY CART ( ".$count['COUNT']." item )";
 ?>
  | <a href="order_history.php">Order History</a> | <a href="cust_logout.php">Logout</a> 
</div>
<div id="pagetitle">
<h1>Online Shopping Portal</h1>a creation of XYZ.com
</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td width="550px" valign="top">
<fieldset>
<legend><strong>MY-CART Order Information</strong></legend>
Enter the quantity of the items before proceeding
<?php
$cart = mysql_query("SELECT p.prodid,p.pname,p.pcompany,p.prodprice FROM MYCART_MASTER m, PRODUCT_MASTER p WHERE p.prodid = m.product AND m.customer = '".$_SESSION['customerid']."'"); 
echo "<form method=\"POST\" action=\"shipping_add_form.php\">";
echo "<table bordercolor='white' border='1' cellspacing='0px' cellpadding='5px'>";
echo "<tr>";
echo "<th id='head'></th><th id='head'>Product</th><th id='head'>Price</th><th id='head'>Quantity</th><th id='head'></th></tr>";
$i=1;
while($row1 = mysql_fetch_array($cart))
{
  echo "<tr>";
  echo "<td id='row1'> ".$i.". </td>";
  echo "<td id='row'>".$row1['pcompany']." ".$row1['pname']."</td>";
  echo "<td id='row'>Rs.".$row1['prodprice']."</td>";
  echo "<td id='row'><select name=\"qty[]\">
  <option value=\"1\">1</option>
  <option value=\"2\">2</option>
  <option value=\"3\">3</option>
  <option value=\"4\">4</option>
  <option value=\"5\">5</option>
  </select></td>";
  echo "<td id='row'><button type=\"button\" onclick=\"delproduct('".$row1['prodid']."')\">Remove From MY-CART</button></td>";
  echo "</tr>";
  $i=$i+1;
}
echo "<tr><td colspan=\"5\"><a href=\"go_shopping.php\"><< Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$cart1 = mysql_query("SELECT p.prodid,p.pname,p.pcompany,p.prodprice FROM MYCART_MASTER m, PRODUCT_MASTER p WHERE p.prodid = m.product AND m.customer = '".$_SESSION['customerid']."'"); 
if(mysql_fetch_array($cart1))
{
  echo "<button type=\"submit\">Proceed To Checkout >></button>";
}
echo "</table></form>";
?>
</fieldset>
</td>
<td width="50px">
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
</BODY>
</html>