What is LogBox?
====================
LogBox is a collection of (well, will be a collection of) PHP tools used to monitor your servers/hosting. I say hosting, as there are better tools out there (such as Nagios) that can (and in many cases _should_) be used if you have root access to the server which will give you much more insight.

loadavg.php
---------------------
loadavg.php is a PHP script which uses the sys_getloadavg() function to find the unix load averages of the server. These load averages are then logged to a MySQL Database. If enabled, thresholds can be set, which when reached will cause an email to be sent to the specified address. The thresholds can be set by changing the $max1load, $max5load and $max15load variables.

I recommend that you set this script to be run as a cronjob - preferably every 5 minutes or so.

I hope to soon release a script that will plot the data which the script records - although data analysis that isn't the primary purpose of this project. 