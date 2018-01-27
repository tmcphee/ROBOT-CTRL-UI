<?php
	echo "".shell_exec("uptime -p")."<BR/>";
	$temp = exec('cat /sys/class/thermal/thermal_zone0/temp');
       echo "CPU temp: ";
	   echo "$temp" / 1000;
	   echo "`C";
	   echo "<BR/>";
	   echo "".shell_exec("iwgetid")."<BR/>";
	   echo "".shell_exec("iwconfig wlan0 | grep -i --color signal")."<BR/>";
?>