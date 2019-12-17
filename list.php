<!DOCTYPE html>
<html>
<head>
<title>LIST</title>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-stand|ie-comp">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="list.css" />
</head>
<body>
	<div id="main">
		<table border="">
<?php
if (! empty($_GET['root'])) {
    $root = $_GET['root'];
    if (! empty($_GET['path'])) {
        $path = $_GET['path'];
    } else {
        $path = $root;
    }
    $handle = opendir($path);
    if ($handle) {
        if ($path !== $root) {
            echo '<tr><td class="type">DIR</td><td class="dir"><a href="list.php?root=' . urlencode($root) . '">.</a></td></tr><tr><td class="type">DIR</td><td class="dir"><a href="javascript:window.history.go(-1)">..</a></td></tr>';
        }else{
            echo '<tr><td class="type">MODE</td><td class="spec"><a href="oldlist.php?root=' . urlencode($root) . '">带图浏览模式</a></td></tr>';
        }
        $picindex=0;
        while (($fl = readdir($handle)) !== false) {
            if ($fl != '.' && $fl != '..') {
                $temp = $path . "/" . $fl;
                echo '<tr><td class="type">';
                if (is_dir($temp)) {
                    echo 'DIR</td><td class="dir"><a href="list.php?root=' . urlencode($root) . '&path=' . urlencode($temp) . '">' . $fl . '</a>';
                } else {
                    $ext = strtoupper(pathinfo($temp)['extension']);
                    echo  $ext . '</td><td class="val">';
                    switch ($ext) {
                        // PIC
                        case 'JPG':
                        case 'JPEG':
                        case 'GIF':
                        case 'PNG':
                        case 'BMP':
                            $picindex++;
                            echo '<a href="pic.php?path=' . urlencode($path) . '&index='.$picindex.'">' . $fl . '</a>';
                            break;
                        // VIDEO
                        case 'MP4':
                        case 'WEBM':
                            echo '<a href="videoplay.php?path=' . urlencode($temp) . '">' . $fl . '</a>';
                            break;
                        // BAN
                        case 'ASS':
                            echo $fl;
                            break;
                        // OTHER
                        default:
                            echo '<a href="' . $temp . '">' . $fl . '</a>';
                            break;
                    }
                }
                echo '</td><tr>';
            }
        }
    }
} else {
    echo 'ROOT not exist.';
}
?>
</table>
	</div>
</body>
</html>