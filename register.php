<!-- REGISTRATION PAGE FOR CUSTOMERS of online shopping portal -->
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
	if(document.frm.uname.value.length<6)
	{
	  alert("Username cannot be less than 6 characters");
	  temp=1;
	}
	if(document.frm.upass.value.length<6)
	{
	  alert("Password cannot be less than 6 characters");
	  temp=1;
	}
	if(document.frm.upass.value!=document.frm.confirmpass.value)
	{
	  alert("Re-typed password does not match with the original");
	  temp=1;
	}
	var x=document.frm.emailaddr.value;
	var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
      alert("Not a valid e-mail address");
      temp=1;
    }
	if(document.frm.addr.value.length==0)
	{
	  alert("Please enter your address");
	  temp=1;
	}
	if((isNaN(parseInt(document.frm.phone.value)))||(!document.frm.phone.value.length==10))
	{
	  alert("Please enter valid mobile/telephone number.");
	  temp=1;
	}
	if(temp==1)
	{
	  document.frm.tempval.value=temp;
	  //location.reload(true);
	}
	return false;
}
</script>
</head>
<body onload="document.frm.uname.focus()">
<center>
<div id="admin_main">
<div id="titlebar">
Welcome Visitor | <a href="default.php">Home</a> | <a href="cust_login.php">Customer Login</a> | Register 
</div>
<div id="pagetitle"><h1>Online Shopping Portal</h1>a creation of XYZ.com</div>
<div id="mainbody">
<table cellspacing="5px">
<tr>
<td valign="top" width="500px">
<fieldset>
<legend>New Customer Registration Form</legend>
<form name="frm" method="post" action="create_customer.php">
<div id="custinfo">
<table cellspacing="5px" cellpadding="5px">
<tr>
<td>Username : </td><td><input type="text" name="uname" maxlength="20"></td>
</tr>
<tr>
<td>Password : </td><td><input type="password" name="upass" maxlength="20"></td>
</tr>
<tr>
<td>Confirm Password : </td><td><input type="password" name="confirmpass" maxlength="20"></td>
</tr>
<tr>
<td>email address : </td><td><input type="text" name="emailaddr" maxlength="20"></td>
</tr>
<tr valign="top">
<td>Address : </td><td><textarea name="addr" rows="4" cols="30"></textarea></td>
</tr>
<tr>
<td>Mobile / Telephone : </td><td><input type="text" name="phone" maxlength="11">
<input type="hidden" name="tempval" value="">
</td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Create OSP Account" onclick="check_form();"> <input type="reset" value="Reset"></td>
</tr>
</table>
</div>
</form></fieldset>
</td>
<td width="100px"></td>
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
</HTML>