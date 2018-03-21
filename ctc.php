<html>
<head>
<title>Click-to-Call</title>
</head>
<body>
<?php

$strHost = "192.168.141.47";
$strUser = "admin";
$strSecret = "secret";
# Numéro Technicien
$strChannel = "SIP/5801";
$strContext = "base";
$strWaitTime = "30";
$strPriority = "1";
$strMaxRetry = "2";
# Numéro à appeler
$strExten = $_POST['txtphonenumber'];
$strCallerId = "Web Call $strExten";
$length = strlen($strExten);
if ($length == 4 && is_numeric($strExten)) {
    $socket = fsockopen($strHost, 5038);
    if ($socket) {
        fputs($socket, "Action: login\r\n");
        fputs($socket, "Events: off\r\n");
        fputs($socket, "Username: $strUser\r\n");
        fputs($socket, "Secret: $strSecret\r\n\r\n");
        fputs($socket, "Action: originate\r\n");
        fputs($socket, "Channel: $strChannel\r\n");
        fputs($socket, "WaitTime: $strWaitTime\r\n");
        fputs($socket, "CallerId: $strCallerId\r\n");
        fputs($socket, "Exten: $strExten\r\n");
        fputs($socket, "Context: $strContext\r\n");
        fputs($socket, "Priority: $strPriority\r\n\r\n");
        sleep(3);
        fputs($socket, "Action: Logoff\r\n\r\n");
        while ($line = fgets($socket)) {
            $line = trim($line);
            echo $line . "<br>";
        }
        fclose($socket);
    }
    ?>
<p>
<table width="300" border="1" bordercolor="#630000" cellpadding="3" cellspacing="0">
	<tr><td>
		<font size="2" face="verdana,georgia" color="#630000">We are currently trying to call you. Please be patient, and wait for your phone to ring!<br>If your phone does not ring after 2 minutes, we apologize, but must either be out, or already on the phone.<br><a href="<?php echo $_SERVER['PHP_SELF'] ?>">Try Again</a></font>
	</td></tr>
</table>
</p>
<?php
} else {
    ?>
<p>
<table width="300" border="1" bordercolor="#630000" cellpadding="3" cellspacing="0">
	<tr><td>
	<font size="2" face="verdana,arial,georgia" color="#630000">Entrer un numero de telephone</font>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>"method="post">
		<input type="text" size="20" maxlength="11" name="txtphonenumber"><br>
		<input type="submit" value="APPEL">
	</form>
	</td></tr>
</table>
</p>
<?php
}
print_r($_POST);
?>
</body>
</html>
