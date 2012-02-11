<?php session_start(); 
if(!isset($_SESSION['customerid']))
  header('Location:default.php');
//$_SESSION['customerid']=session_id();
?>
<!--HOME PAGE FOR THE CUSTOMER-->
<HTML>
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
#visitormenu td
{
  text-align:left;
  font:14px Calibri,sans-serif ;
}
</style>
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
 | My Account | <a href="go_shopping.php">Go Shopping</a> | 
 <a href="mycart_home.php"><?php
 $res = mysql_query("SELECT COUNT(*) 'COUNT' FROM MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."'");
 $count = mysql_fetch_array($res);
 echo "MY CART</a> ( ".$count['COUNT']." item )";
 ?>
  | <a href="order_history.php">Order History</a> | <a href="cust_logout.php">Logout</a> 
</div>
<div id="pagetitle">
<h1>Online Shopping Portal</h1>a creation of XYZ.com
</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td valign="top" width="500px">
<div id="custinfo">
<?php echo $row['custname']; ?>, Welcome to your OSP Account<br/><br/>
<fieldset>
<legend>MY CART Section</legend>
<div style="padding:10px 10px 10px 10px">
<?php 
if($count['COUNT']==0)
{
  echo "There is no item in your shopping cart.<br/><br/><hr/>";
  echo "Here is what you can do.<br/><br/>";
  echo "<a href='go_shopping.php'>Go Shopping @ OSP</a>";
}
else
{
  echo "There is ".$count['COUNT']." item(s) in your shopping cart.<br/><br/><hr/>";
  echo "Here is what you can do.<br/><br/>";
  echo "<table cellpadding='2px' cellspacing='2px'><tr>";
  echo "<td align='left' width='250px'><a href='go_shopping.php'>Continue Shopping</a></td>";
  echo "<td align='right' width='250px'><a href='mycart_home.php'>Proceed to Checkout</a></td>";
  echo "</tr></table>";
}
?>
</div>
</fieldset>
</div>
</td>
<td width="100px"></td>
<td valign="top" width="250px">
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
</HTML>