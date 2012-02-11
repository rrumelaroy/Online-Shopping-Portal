<!-- HOMEPAGE for online shopping portal -->
<html>
<head>
<style type="text/css">
body
{
  background-image:url('images/backwall.jpg');
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
#menu1 th
{
  background-color:CadetBlue;
  color:White;
  width:100px;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#menu1 td
{
  font:14px Calibri,sans-serif;
  text-align:left;
}
#menu2 th
{
  background-color:DarkTurquoise;
  color:White;
  width:200px;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#menu2 td
{
  font:14px Calibri,sans-serif;
  text-align:left;
}
#menu3 th
{
  background-color:Aqua;
  color:White;
  width:300px;
  font:14px Calibri,sans-serif;
  text-align:left;
  font-weight:bold;
}
#menu3 td
{
  font:14px Calibri,sans-serif;
  text-align:left;
}
#visitormenu th
{
  background-color:SandyBrown;
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
<script type="text/javascript">
function showCompany(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("menu2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","loadcompany.php?c="+str,true);
xmlhttp.send();
}
function showProduct(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","displayproduct.php?com="+str,true);
xmlhttp.send();
}
function showProduct(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("menu3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","displayvisitor.php?com="+str,true);
xmlhttp.send();
}
function viewdetails(str)
{
  myWindow=window.open('','','width=400,height=400');
  myWindow.document.write(str);
  myWindow.focus();
}
</script>
</head>
<body><center>
<div id="admin_main">
<div id="titlebar">
Welcome Visitor | Home | <a href="cust_login.php">Customer Login</a> | <a href="register.php">Register</a> 
</div>
<div id="pagetitle"><h1>Online Shopping Portal</h1>a creation of XYZ.com</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td valign="top">
<fieldset>
<legend>Products available @ OSP</legend>
<table cellspacing="5px" cellpadding="5px">
<tr>
<td width="100px" valign="top">
<div id="menu1">
<?php
$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$sql="SELECT DISTINCT(pcatagory) FROM PRODUCT_MASTER";
$result = mysql_query($sql);
echo "<table cellspacing='0px' cellpadding='5px'>
<tr>
<th>CATEGORY</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a cursor=\"pointer\" onclick=\"showCompany(this.id)\" id=\"".$row['pcatagory']."\">" . $row['pcatagory'] . "</a></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
</div>
</td>
<td width="200px" valign="top">
<div id="menu2">

</div>
</td>
<td width="300px" valign="top">
<div id="menu3">

</div>
</td>
</tr>
</table>
</fieldset>
</td>
<td width="250px" valign="top">
<div id="visitormenu">
<table cellspacing="5px" cellpadding="5px">
<tr><th>Important Links @ OSP</th></tr>
<tr><td><a href="default.php">OSP Home</a></td></tr>
<tr><td><a href="default.php">Various Products @ OSP</a></td></tr>
<tr><td><a href="register.php">Register @ OSP</a></td></tr>
<tr><td><a href="cust_login.php">Login to you account</a></td></tr>
</table>
</div>
</td>
</tr>
</table>
</div>
</div></center>
</body>
</html>