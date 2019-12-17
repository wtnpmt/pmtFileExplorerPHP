<!DOCTYPE html>
<html>
<head>
<title>VIDEO</title>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-stand|ie-comp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="main.css" />
<style>
video {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%
}
</style>
</head>
<body>
	<video controls preload="auto" loop src="
<?php
$path = $_GET['path'];
echo $path;
?>
	"></video>
</body>
</html>