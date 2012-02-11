<?php
session_start();
session_register('productid');
$_SESSION['productid']= $_GET['prod'];
?>