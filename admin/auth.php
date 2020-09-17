<?php
session_start();
$var=$_SESSION['var']=$id;
if(!$var)
{
	header("location:index.php");
}
?>