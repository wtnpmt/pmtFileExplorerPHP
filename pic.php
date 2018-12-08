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

footer {
	position: fixed;
	bottom: 10px;
	width: 100%;
}

footer button {
	width: 45%;
	font-size: 24px;
}

#main {
	font-size: 24px;
	width: 100%;
}

#main img {
	width: 100%;
	height: auto;
}

@media screen and (max-width: 1199px) {
	#main img {
		max-width: 100%;
	}
}

@media screen and (min-width: 1200px) {
	#main img {
		max-width: 1200px;
	}
}
</style>
<script>

</script>
</head>
<body>
	<div id="main">
		<img id="image" />
		<div id="ftblk"></div>
		<footer>
			<button id="prebt" onclick="pre()">没有了</button>
			<button id="nextbt" onclick="next()">没有了</button>
		</footer>
	</div>
	<script>
	index = <?php
			if (! empty($_GET['index'])) {
			    echo $_GET['index'];
			} else {
			    echo 0;
			}
			?>;
			piclist = [""<?php
			if (! empty($_GET['path'])) {
			    $path = $_GET['path'];
			    $handle = opendir($path);
			    if ($handle) {
			        while (($fl = readdir($handle)) !== false) {
			            $temp = $path . "/" . $fl;
			            switch (strtoupper(pathinfo($temp, PATHINFO_EXTENSION))) {
			                // PIC
			                case 'JPG':
			                case 'JPEG':
			                case 'GIF':
			                case 'PNG':
			                case 'BMP':
			                    echo ',"' . $fl . '"';
			                    break;
			                default:
			                    break;
			            }
			        }
			    }
			}
			?>];
			path = "<?php
			echo $path;
			?>";
			preimg = new Image();
			nextimg = new Image();
			prebt = document.getElementById("prebt");
			nextbt = document.getElementById("nextbt");
			preimg.onload = function(){
				prebt.innerHTML = "上一张";
				prebt.disabled = "";
			}
			nextimg.onload = function(){
				nextbt.innerHTML = "下一张";
				nextbt.disabled = "";
			}
			function load(){
				prebt.disabled = "disabled";
				nextbt.disabled = "disabled";
				prebt.innerHTML = "没有了";
				nextbt.innerHTML = "没有了";
				document.getElementById("image").src = path + "/" + piclist[index];
				if(piclist.length > 1){
					if(index > 1){
						preimg.src = path + "/" + piclist[index - 1];
						prebt.innerHTML = "加载中";
					}
					if(index < piclist.length - 1){
						nextimg.src = path + "/" + piclist[index + 1];
						nextbt.innerHTML = "加载中";
					}
				}
			}
			function pre(){
				if(index > 1){
					index --;
					load();
				}
			}
			function next(){
				if(index < piclist.length - 1){
					index ++;
					load();
				}
			}
	load();
	document.getElementById("ftblk").style.height = (document.getElementsByTagName("footer")[0].offsetHeight + 20) + "px";
	</script>
</body>
</html>