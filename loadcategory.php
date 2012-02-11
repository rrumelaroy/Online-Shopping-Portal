<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$sql="SELECT DISTINCT(pcatagory) FROM PRODUCT_MASTER";
$result = mysql_query($sql);
echo "<table>
<tr>
<th>CATEGORY</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a onclick=\"showCompany(this.id)\" id=\"".$row['pcatagory']."\">" . $row['pcatagory'] . "</a></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>