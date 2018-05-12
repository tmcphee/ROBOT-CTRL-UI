<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<html>
    <head>
	<link href = "./Main.css" type = "text/css" rel  = "stylesheet">
	<script LANGUAGE=Javascript type="text/javascript" src="javascript/jquery.js"></script>
	<script LANGUAGE=Javascript type="text/javascript" src="javascript/Main.js"></script>
	
        <title>ROBOT-CTRL-UI</title>
    </head>
    <body onload="run()">
		<div id='Logout'>
			<button onClick="window.location.href ='/Logout.php';"><img width="28" height="28" src="images/logout.png" /></button>
			<button onclick="restart()"><img width="28" height="28" src="images/restart.png" /></button>
			<button onclick="shutdown()"><img width="28" height="28" src="images/power.png" /></button>
			<button onClick=""><img width="28" height="28" src="images/light.png" /></button>
			<button onclick="window.location.href ='https://chrome.google.com/webstore/detail/vnc%C2%AE-viewer-for-google-ch/iabmpiboiopbgfabjmgeedhcmjenhbla';""><img width="28" height="28" src="images/vnc.jpg" /></button>
			<button onclick="window.location.href ='/DIR.php';"><img width="28" height="28" src="images/folder.png" /></button>
			
			<button id="settings" onClick="window.location.href ='/Settings.php';"><img width="28" height="28" src="images/settings_gear.png" /></button>
			
			<br><B>
			Logged in as 
			<?php
				print_r($_SESSION['UserData']['Username']);
			?></B>
			<br>
			<br>			
			
			<div style='width:300px' id='status'></div>
  
			<script>
				function update() {
					$.ajax({url: "http://192.168.35.26/bin/status.php", cache:false, success: function (result) {
					$('#status').html(result);
					setTimeout(function(){update()}, 5000);
					}});
				}
				update();
			</script>  
			
		</div>
			
			
			<iframe name="votar" style="display:none;"></iframe>
			<br>
			<table width="800" border="3" align="center" cellspacing="6" class="Table">
			<tr>
				<td>
					<div id='Video' style="text-align:center">
						<iframe src="http://ENTER_YOUR_IP_HERE:8081/index.html" alt="Web site is not avaialable" frameborder="0" align="center" width="840" height="540" align="center" scrolling="no"></iframe>
					</div>
				</td>
				<td bgcolor="#B6B6B6">
					Motor Speed<br><br>
					<div class="""slidecontainer">
						<input type="range" min="1" max="100" value="50" class="slider" id="myRange">
						<p>Value: <span id="demo"></span></p>
					</div>

					<script>
						var slider = document.getElementById("myRange");
						var output = document.getElementById("demo");
						output.innerHTML = slider.value;

						slider.oninput = function() {
						output.innerHTML = this.value;
						}
					</script>
					
					<br><br><br>
					
					<table width="250" border="0" align="center" cellspacing="1" class="Table">
						<tr>
							<td></td>
							<td>
								<form id="forward" action="bin/forward.php" target="votar">
									<input style ="float: left; height: 75px; width: 75px; padding: 5px" type="image" src="/images/up.png" value="Forward">           
								</form>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<form id="left" action="bin/left.php" target="votar">
									<input style ="float: left; height: 75px; width: 75px; padding: 5px" type="image" src="/images/left.png" value="Left">           
								</form>
							</td>
							<td>
								<form id="stop" action="bin/stop.php" target="votar">
									<input style ="float: left; height: 75px; width: 75px; padding: 5px" type="image" src="/images/stop.png" value="Stop">           
								</form>
							</td>
							<td>
								<form id="right" action="bin/right.php" target="votar">
									<input style ="float: left; height: 75px; width: 75px; padding: 5px" type="image" src="/images/right.png" value="Right">           
								</form>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<form id="reverse" action="bin/reverse.php" target="votar">
									<input style ="float: left; height: 75px; width: 75px; padding: 5px" type="image" src="/images/dn.png" value="Reverse">           
								</form>
							</td>
							<td>

							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
			
			<script src="javascript/Main_btns.js"></script>
			<iframe id='frametest' style="display:none;"></iframe>
    </body>
</html>
