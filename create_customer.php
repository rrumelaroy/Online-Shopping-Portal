<?php 
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("osp", $con);
$result = mysql_query("SELECT * FROM CUSTOMER_MASTER WHERE custname = '".$_POST["uname"]."'");
if($_POST["tempval"]==1)
{
     mysql_close($con);
	 session_destroy();
     header('Location:register.php');	 
}
else if(mysql_fetch_array($result))
  {
     mysql_close($con);
     session_destroy();
	 header('Location: regret_register.php');
  }
else
  {
     do
     {
        $id="cid".rand(1,999999);
		$res=mysql_query("SELECT custid FROM CUSTOMER_MASTER WHERE custid = '".$id."'");
		if(mysql_fetch_array($res))
		{
		  $id="";
		}
     }while($id=="");
     $sql="INSERT INTO CUSTOMER_MASTER VALUES ('".$id."','".$_POST["uname"]."','".$_POST[upass]."','".$_POST["emailaddr"]."','".$_POST["addr"]."','".$_POST["phone"]."')";
     session_register('customerid');
	 $_SESSION['customerid']=$id;
	 /*$from = "Online Shopping Portal";
     $to = $_POST["uname"].' <'.$_POST["emailaddr"].'>';
     $subject = "Welcome to Online Shopping Portal";
     $body = "Your account has been successfully created in Online Shopping Portal. HAPPY SHOPPING!!!";
     $host = "smtp.gmail.com";
     $port = "587";
     $username = "rrumelaroy@gmail.com";
     $password = "dulalrajibruwan";
     $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
     $smtp = mail::factory('smtp',array ('host' => $host,'port' => $port,'auth' => true,'username' => $username,'password' => $password));
     $mail = $smtp->send($to, $headers, $body);*/
     if (!mysql_query($sql,$con))
     {
       die('Error: ' . mysql_error());
     }	 
	 mysql_close($con);
	 header('Location: customer_home.php');
  }
?>
