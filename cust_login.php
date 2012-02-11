<!-- LOGIN PAGE FOR CUSTOMERS of online shopping portal -->
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
function check_form()
{
    var temp=0;
	if(document.frm.user.value.length<6)
	{
	  alert("Username cannot be less than 6 characters");
	  temp=1;
	}
	if(document.frm.pass.value.length<6)
	{
	  alert("Password cannot be less than 6 characters");
	  temp=1;
	}
	if(document.frm.type.value=="default")
	{
	  alert("Please select a USER TYPE for logging in");
	  temp=1;
	}
	if(temp==1)
	{
	  document.frm.tempval.value=temp;
	  //location.reload(true);
	}
}
</script>
</head>
<body onload="document.frm.user.focus()">
<center>
<div id="admin_main">
<div id="titlebar">
Welcome Visitor | <a href="default.php">Home</a> | Customer Login | <a href="register.php">Register</a> 
</div>
<div id="pagetitle"><h1>Online Shopping Portal</h1>a creation of XYZ.com</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td valign="top" width="350px">
<fieldset>
<legend>Customer Login Form</legend>
<form name="frm" method="post" action="verify_cust_login.php">
<div id="custinfo">
<table cellspacing="5px" cellpadding="5px">
<tr>
<td>Username : </td><td><input type="text" name="user" maxlength="20"></td>
</tr>
<tr>
<td>Password : </td><td><input type="password" name="pass" maxlength="20"></td>
</tr>
<tr>
<td>User Type : </td>
<td>
<select name="type">
<option value="default"> - - SELECT - - </option>
<option value="customer">Customer</option>
<option value="admin">Administrator</option>
</select>
</td>
</tr>
<input type="hidden" name="tempval" value="">
</td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Log In" onclick="check_form();"> <input type="reset" value="Reset"></td>
</tr>
</table>
</div>
</form>
</fieldset>
</td>
<td width="250px"></td>
<td valign="top" width="250px">
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
</div>
</center>
</body>
</html>