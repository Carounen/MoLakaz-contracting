<?php
session_start();
//delete the two session variables “fn” and “cid”
unset($_SESSION["cn"]);
unset($_SESSION["coid"]);
//destroy the session variable
session_destroy();
//redirect to home page
header("Location: index.php");
?>