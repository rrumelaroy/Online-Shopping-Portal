<?php
session_start();
$cat=$_GET["c"];
session_register('category');
$_SESSION['category']=$cat;
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$sql="SELECT DISTINCT(pcompany) FROM PRODUCT_MASTER WHERE pcatagory = '".$cat."'";
$result = mysql_query($sql);
echo "<table cellspacing='0px' cellpadding='5px'>
<tr>
<th>COMPANY :[".$_SESSION['category']."]</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a onclick=\"showProduct(this.id)\" id=\"".$row['pcompany']."\">" . $row['pcompany'] . "</a></td>";
  //echo "<td>" . $row['pcompany'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>