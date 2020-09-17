<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<?php
session_destroy();
header("location:../index.php");
?>
</body>
</html>