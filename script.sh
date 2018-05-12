echo Automated Robot Installer by Tyler
echo  

echo UPDATEING SYSTEM...
sudo apt-get update -y
sudo apt-get upgrade
echo  

echo REMOVING BLOATWARE...
sudo apt-get remove --purge wolfram-engine penguinspuzzle dillo squeak-vm squeak-plugins-scratch scratch nuscratch sonic-pi idle3 smartsim java-common minecraft-pi python-minecraftpi python3-minecraftpi libreoffice*
sudo apt-get clean
sudo apt-get autoremove -y
echo  

echo INSTALLING samba...
sudo apt-get install samba samba-common-bin -y
echo For command below ENTER all at bottom of file:
echo [html]
echo Comment = WEB SERVER
echo Path = /var/www/html
echo Browseable = yes
echo Writeable = Yes
echo only guest = no
echo create mask = 0777
echo directory mask = 0777
echo Public = no
echo Guest ok = no
sudo nano /etc/samba/smb.conf
echo  
echo **********SAMBA*PASSWORD*SETUP**********
sudo smbpasswd -a pi
echo ****************************************
sudo /etc/init.d/samba restart
echo  

echo INSTALLING wireingPi...
git clone git://git.drogon.net/wiringPi
cd wiringPi
./build
cd
echo  

echo     *PIN LAYOUT*
echo 10001100000011000000
echo 00000000000000000000
echo  
echo G000WB000000GY000000
echo N000TL000000RE000000
echo D000EU000000NL000000
echo  

echo SETTING UP wiringPi...
echo For command below ADD the following at bottom of file before exit 0:
echo gpio -g mode 5 out
echo gpio -g mode 6 out
echo gpio -g mode 27 out
echo gpio -g mode 22 out
sudo nano /etc/rc.local
echo  

echo INSTALLING Apache2 Web Server...
sudo apt-get install apache2 -y
echo  

echo INSTALLING Apache2 Addon php...
sudo apt-get install php libapache2-mod-php -y
echo  

echo REMOVING DEFAULT Apache2 File 'index.html'...
cd /var/www/html
sudo rm index.html
cd
echo  

echo GRANTING 777 PERMISSION to USER 'Pi' in html folder...
sudo chmod -R 777 /var/www/html
echo  

echo CLONEING REPOSITORY to html folder...
git clone https://github.com/tmcphee/ROBOT-CTRL-UI /var/www/html
echo  

echo INSTALLING Motion...
sudo raspi-config nonint do_camera 0
sudo apt-get install motion -y
echo  

ls /dev/video*
sudo modprobe bcm2835-v4l2
echo  

v4l2-ctl -V
echo  

echo For command below:
echo Set daemon on, stream_localhost off, output_pictures off, ffmpeg_output_movies off, width 640, height 480
echo framerate 100, stream_maxrate 60,minimum_frame_time 0.01, target_dir /home/pi/Monitor, v4l2_palette 15
echo EXIT by ctr-X then Y, Search by ctr-W then ENTER
sudo nano /etc/motion/motion.conf
echo  

echo For command below:
echo Set start_motion_daemon=yes
echo EXIT by ctr-X then Y
sudo sudo nano /etc/default/motion
echo  

mkdir /home/pi/Monitor
sudo chgrp motion /home/pi/Monitor
chmod g+rwx /home/pi/Monitor
echo  

echo For command below:
echo Add at 'bcm2835-v4l2' to bottom of file
echo EXIT by ctr-X then Y
sudo sudo nano /etc/modules
echo  

sudo service motion start
echo PORT: 8081
sudo ifconfig wlan0
echo  

echo Press Any Key to Restart
read reply
echo END OF SCRIPT.... REBOOTING
sudo reboot