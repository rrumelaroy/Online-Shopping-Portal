<?php
session_start();
$con=mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp",$con);

$result = mysql_query("SELECT * FROM ADMINISTRATOR_MASTER WHERE adminname = '".$_POST['user']."' AND adminpass = '".$_POST['pass']."'");
if($_POST["tempval"]==1)
{
   session_destroy();
   header('Location:cust_login.php');
   exit();
}
else
{
  $tmp = 0;
  if($_POST['type']=="customer")
  {
    $result=mysql_query("SELECT custid FROM CUSTOMER_MASTER WHERE custname = '".$_POST['user']."' AND custpassword = '".$_POST['pass']."'");  
    $tmp=1;
  }
  else
  {
    $result = mysql_query("SELECT * FROM ADMINISTRATOR_MASTER WHERE adminname = '".$_POST['user']."' AND adminpass = '".$_POST['pass']."'");
  }
  $row=mysql_fetch_array($result);
  if(!$row)
   {
     session_destroy();
	 header('Location:cust_login.php');
	 exit();
   }
   else
   {
     if($tmp==1)
	 {
       session_register('customerid');
	   $_SESSION['customerid']=$row["custid"];
	   header('Location:customer_home.php');
	   exit();
	 }
	 else
	 {
	   session_register('admin');
	   $_SESSION['admin']="Administrator";
	   header('Location:admin_home.php');
	   exit();
	 }
   }
}
?>