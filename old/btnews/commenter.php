<?php 
require('newsconfig.php');
$entry = $_POST["entry"];
$name = $_POST["name"];
$message = $_POST["message"];
$subject = $_POST["subject"];
function vbcode($message) {
	$message = str_replace("http://www.", "www.", $message);
	$message = str_replace("www.", "http://www.", $message);
	$message = str_replace("[url]http://","[url]",$message);
	$message = str_replace("[url=http://","[url=",$message);
	$message = preg_replace("/(http.*:\/\/.+)\s/U", "<a href=\"$1\">$1</a> ", $message);
	$message = preg_replace('/(\[b\])(.+?)(\[\/b\])/', '<b>\\2</b>',$message);
	$message = preg_replace('/(\[i\])(.+?)(\[\/i\])/', '<i>\\2</i>',$message);
	$message = preg_replace('/(\[u\])(.+?)(\[\/u\])/', "<u>\\2</u>", $message);
	$message = preg_replace('/(\[color=(.+?)\])(.+?)(\[\/color\])/', '<font color=\\2>\\3</font>',$message);
	$message = preg_replace('/(\[email\])(.+?)(\[\/email\])/', "<a href=\"mailto:\\2\">\\2 </a>", $message);
	$message = preg_replace('/(\[email=(.+?)\])(.+?)(\[\/email\])/', "<a href=\"mailto:\\2\">\\3</a>", $message);
	$message = preg_replace('/(\[url\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $message);
	$message = preg_replace('/(\[url=\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $message);
	$message = preg_replace('/(\[url=(.+?)\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\3</a>", $message);
	$message = stripslashes($message);
	$message = str_replace("!!!!", "!", $message);

	return $message;
}

$oldmessage = $message;

if(strlen($name) > $namlength){
	$toonlong = strlen($name) - $namlength;
	die("<center>$toolongname<br>Please Shorten Your Name By $toonlong Characters.</center></html>");
	}
elseif(strlen($subject)>$sublength){
	$tooslong = strlen($site) - $sublength;
	die("<center>$toolongsub<br>Please Shorten Your Subject By $tooslong Characters.</center></html>");
	}
elseif(strlen($message)>$messlength){
	$toomlong = strlen($message) - $messlength;
	die("<center>$messtoolong<br>Please Shorten Your Message By $toomlong Characters.</center></html>");
	}
elseif($name=="")
	{
	$name = "Anonymous";
	}
if($subject=="")
	{
	$subject = "Reply To News Posting";
	}
if($message=="")
	{
	die("<center><br><b>You Must Submit A Message</b></center></html>");
	}

$message = htmlspecialchars($message);
$subject = htmlspecialchars($subject);
$name = htmlspecialchars($name);
$message = str_replace("
", "", $message);
$message = vbcode($message);

foreach($smilies as $key=>$value){
    $message = str_replace("$key", "$value", "$message");
}

$date = date("D, F jS y");
$comment = "$entry||$subject||$oldmessage||$name||$date\n";
$file = "comments.txt";
$fp = fopen($file,'a'); 
$fw = fwrite($fp,$comment);
fclose($fp);

$newfile = "news.txt";
$lines = file($newfile);
$entry_to_edit = $lines[$entry];
list($date,$stuff,$author,$image,$about,$skey,$comment) = explode('||',$entry_to_edit);
$newcomment = $comment + 1;
$entry_composed = "$date||$stuff||$author||$image||$about||$skey||$newcomment\n";
$lines[$entry] = $entry_composed;
$fp = fopen($newfile,'w'); 
foreach($lines as $commented) {
	$fw = fwrite($fp,$commented);
}
fclose($fp);
header("Refresh:3;url=comment.php?entry=$entry");
?>
<html>
<head>
<title>Thanks</title>
<link href="general.css" rel="stylesheet" type="text/css">
</head>
<body>
<table height="100%" width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr> 
    <td height="100%" align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td class="maintable" align="center"><font color="#FFFFFF">You Are Being Redirected To Your Comment.<br>
            If Your Browser Does Not Forward You Automatically.<br> <a href="comment.php?entry=<?php echo $entry; ?>">Click 
            Here</a></font></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>