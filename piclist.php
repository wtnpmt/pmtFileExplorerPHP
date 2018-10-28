<!DOCTYPE html>
<html>
<head>
<title>PIC</title>
<meta name="viewport"
	content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="main.css" />
<style>
body {
	background-color: black;
}

#main {
	font-size: 24px;
	width: 100%;
}

#main img {
	width: 100%;
	height: auto;
}

@media screen and (max-width: 799px) {
	#main img {
		max-width: 100%;
	}
}

@media screen and (min-width: 800px) {
	#main img {
		max-width: 800px;
	}
}
</style>
</head>
<body>
	<div id="main">
<?php
if (! empty($_GET['path'])) {
    $path = $_GET['path'];
    $handle = opendir($path);
    if ($handle) {
        while (($fl = readdir($handle)) !== false) {
            $temp = $path . "/" . $fl;
            switch (strtoupper(pathinfo($temp)['extension'])) {
                // PIC
                case 'JPG':
                case 'JPEG':
                case 'GIF':
                case 'PNG':
                case 'BMP':
                    echo '<img src="' . $temp . '" >';
                    break;
                default:
                    break;
            }
        }
    }
} else {
    echo 'PIC not exist.';
}
?>
	</div>
</body>
</html>