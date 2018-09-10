<?php 
include('include/db.php');
session_start();

$_SESSION["User_Id"] = null;

session_destroy(); 
echo '<script type="text/javascript">location.href = "login";
        </script>';

?>