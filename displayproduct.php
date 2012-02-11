<?php
session_start();
$comp=$_GET["com"];
$cat = $_SESSION['category'];
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$sql="SELECT * FROM PRODUCT_MASTER WHERE pcatagory = '".$cat."' AND pcompany = '".$comp."'";
$result = mysql_query($sql);
echo "<table cellspacing='0px' cellpadding='5px'>";
echo "<tr><th>DISPLAY PRODUCT :[".$cat."] [".$comp."]</th></tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr><td>" . $row['pname'] . "</td></tr>";
  echo "<tr><td>Price : Rs." . $row['prodprice']."</td></tr>";
  $var = "<table><tr><td>" . $row['pname'] . "</td></tr>".
         "<tr><td>Price : Rs." . $row['prodprice']."</td></tr>".
         "<tr><td>Company : " . $row['pcompany'] . "</td></tr>".
         "<tr><td>Category : " . $row['pcatagory'] . "</td></tr>".
         "<tr><td>Feature : <BR/>" . $row['pfeature'] . "</td></tr>";
  echo "<tr><td><button type=\"button\" onclick=\"viewdetails('".$var."')\">View Details</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $check = mysql_query("SELECT * from MYCART_MASTER WHERE customer = '".$_SESSION['customerid']."' AND product = '".$row['prodid']."'");
  $checkavail = mysql_fetch_array($check);
  if($checkavail)
  {
    echo "<button type=\"button\" disabled='disabled')\">Already in MY-CART</button></td></tr>";
  }	
  else
  {  
    echo "<button type=\"button\" onclick=\"setproductid('".$row['prodid']."')\">Add to MY-CART</button></td></tr>";
  }
  }
echo "</table>";
mysql_close($con);
?>