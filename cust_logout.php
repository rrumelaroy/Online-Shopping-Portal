<?php
session_start();
unset($_SESSION['customerid']);
unset($_SESSION['admin']);
session_destroy();
header('Location: default.php');
?>