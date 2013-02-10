<?php
//mySQL Server Hostname
$hostname = "localhost";
$username = "username";
$password = "password";
$database = "database";

$max1load = 4; //maximum 1 minute load average
$max5load = 2;
$max15load = 1;

$mailnotifications = True; //Set to True or False to toggle email notifications
$email = "joseph@redfern.me"; //Your email address (for notifications)
$subject = "OH NOES LOADIOS"; // Notification Email Subject

//End configuration... appart from maybe lines 24-28 if you want to customise that

mysql_connect($hostname, $username, $password);
mysql_select_db($database);
$avg = sys_getloadavg(); //returns an array of 1,5,15m load

if($emailnotifications == True){
	if($avg[0]>$max1load || $avg[1]>$max5load || $avg[2]>$max15load){
		$message = "Oh dear. The load on ".$_SERVER["SERVER_NAME"]." just exceeded one of your limits.\n Current load: ";
		foreach($avg as $load){
			$message .= $load." ";
		}
		mail($email, $subject, $message);
		print "Email Sent. Message: \n";
		print $message;
	}else{
		print "Email not sent, threshold not reached.";
	}
}

$query = "INSERT INTO `loadavg`(`id`, `time`, `1`, `5`, `15`) VALUES(NULL, NULL, '$avg[0]', '$avg[1]', '$avg[2]')";
mysql_query($query) or die(mysql_error());
print "Load Average Logged";

mysql_close();
?>
