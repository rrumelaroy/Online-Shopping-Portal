<?php session_start();
session_register('quantity');
$_SESSION['quantity']=$_POST['qty'];
?>
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
#quantity th
{
  background-color:SeaGreen;
  color:White;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#quantity td
{
  background-color:Moccasin;
  color:Black;
  font:14px Calibri,sans-serif;
  text-align:left;
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
#mycart
{
   margin:10px 200px 10px 200px;
   padding:20px 20px 20px 20px;
   background-color:Plum;
   vertical-align:top;
}
#shipad
{
   margin:10px 200px 10px 200px;
   padding:20px 20px 20px 20px;
   background-color:Pink;
   vertical-align:top;
}
</style>
<script type="text/javascript">
function check_form()
{
    var temp=0;
	var x = document.frm;
	if(x.line1.value.length<6)
	{
	  alert("Please write a proper line of address");
	  temp=1;
	}
	if(x.city.value.length<1)
	{
	  alert("Enter the name of the city / town");
	  temp=1;
	}
	if(x.state.value.length<1)
	{
	  alert("Enter the name of the state");
	  temp=1;
	}
	var y=document.frm.emailadd.value;
	var atpos=y.indexOf("@");
    var dotpos=y.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
    {
      alert("Not a valid e-mail address");
      temp=1;
    }
	if((isNaN(parseInt(x.pin.value)))||(!x.pin.value.length>=6))
	{
	  alert("Please enter valid pin code.");
	  temp=1;
	}
	if((isNaN(parseInt(x.phone.value)))||(!x.phone.value.length==10))
	{
	  alert("Please enter valid mobile/telephone number.");
	  temp=1;
	}
	if(temp==1)
	{
	  x.tempval.value=temp;
	  //location.reload(true);
	}
}
</script>
</head>
<BODY onload="document.frm.line1.focus()">
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
<td width="500px" valign="top">
<fieldset>
<legend><strong>Shipping Address Information</strong></legend>
Enter the proper address for shipping the order to be placed
<form name="frm" method="post" action="order_ref_num.php">
<table cellspacing="5px" cellpadding="5px">
<tr>
<td>Address Line 1 </td><td><input type="text" name="line1" maxlength="100"></td>
</tr>
<tr>
<td>Address Line 2 </td><td><input type="text" name="line2" maxlength="100"></td>
</tr>
<tr>
<td>City / Town </td><td><input type="text" name="city" maxlength="50"></td>
</tr>
<tr>
<td>State </td><td><input type="text" name="state" maxlength="50"></td>
</tr>
<tr>
<td>Pin </td><td><input type="text" name="pin" maxlength="6"></td>
</tr>
<tr>
<td>email Address </td><td><input type="text" name="emailadd" maxlength="50"></td>
</tr>
<tr>
<td>Telehone / Mobile </td><td><input type="text" name="phone" maxlength="10"><input type="hidden" name="tempval" value=""></td>
</tr>
<tr>
<td colspan="2"><a href="go_shopping.php"><< Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" onclick="check_form()">Place Order</button>
&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset">Reset</button></td>
</tr>
</table>
</form>
</fieldset>
</td>
<td width="150px"></td>
<td width="250px" valign="top">
<div id="quantity">
<fieldset>
<legend><strong>Quantity of Ordered Products</strong></legend>
<?php
$cart = mysql_query("SELECT p.prodid,p.pname,p.pcompany,p.prodprice FROM MYCART_MASTER m, PRODUCT_MASTER p WHERE p.prodid = m.product AND m.customer = '".$_SESSION['customerid']."'"); 
echo "<table cellpadding='5px' border='1' bordercolor='white'>";
echo "<tr>";
echo "<th></th><th>Product</th><th>Quantity</th></tr>";
$i = 0;
while($row1 = mysql_fetch_array($cart))
{
  echo "<tr>";
  echo "<td> ".($i+1).". </td>";
  echo "<td> ".$row1['pcompany']." ".$row1['pname']." </td>";
  echo "<td>".$_SESSION['quantity'][$i]."</td>";
  echo "</tr>";
  $i = $i + 1;
}
echo "<tr><td colspan='3'><a href='mycart_home.php'><< Alter the Quantity of items</a></td></tr>";
echo "</table>";
?>
</fieldset>
</div><br/><br/>
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