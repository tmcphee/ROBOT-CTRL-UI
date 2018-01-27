<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<html>
    <head>
	<link href = "./Login.css" type = "text/css" rel  = "stylesheet">
	<script LANGUAGE=Javascript type="text/javascript" src="javascript/Settings.js"></script>
        <title>Settings</title>
    </head>
    <body onload="run()">
        <button style="border:0px solid black; background-color: transparent; width='28'; height='28';" onclick="window.location.href ='/Main.php';"><strong style="color: orange;"><font size="8"><</font></strong></button>
		<h4 align="center">Setting Configuration</h4>

		<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
			<tr>
			  <td colspan="2" align="center" valign="top"></td>
			</tr>
			<tr>
			  <td colspan="2" align="left" valign="top"><h3>Controls</h3></td>
			</tr>
			<tr>
			  <td><select id="assign"></select></td>
			  <td><select id="keys"></select></td>
			<tr>
			  <td> </td>
			  <td><button onclick="set()"></button>Set</td>
			</tr>
		</table>
		<br><br>
		<table width="400" border="3" align="center" cellpadding="5" cellspacing="1" class="Table">
			<tr>
			  <td>Forward</td>
			  <td><span id="forward"></span></td>
			</tr>
			<tr>
			  <td>Reverse</td>
			  <td><span id="reverse"></span></td>
			</tr>
			<tr>
			  <td>Left</td>
			  <td><span id="left"></span></td>
			</tr>
			<tr>
			  <td>Right</td>
			  <td><span id="light"></span></td>
			</tr>
		</table>
	
	
	
	
	</body>
</html>