<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Post A Comment</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT language="JavaScript" type="text/javascript">
 <!--
  function setsmiley(which){
  document.newmessage.message.value = document.newmessage.message.value + which;
  }
 //-->
</SCRIPT>
<link href="general.css" rel="stylesheet" type="text/css">
</head>
<body marginwidth="0" marginheight="0">
<center><br><table height="80%" width="80%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td class="maintable" align="center" valign="middle">
<?php 
require('newsconfig.php');
echo "<a href=\"$newspage\">Back To News</a>";
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
$entry = $_GET["entry"];
$ogfile = "news.txt";
$oglines = file($ogfile);
list($date,$message,$author,$image,$subject,$key) = explode('||',$oglines[$entry]);
foreach($smilies as $key=>$value){
    $message = str_replace("$key", "$value", "$message");
}
echo "<table width=400 border=0 cellspacing=0 cellpadding=2><tr>
          <td class='title'>$subject</td>
  </tr>
  <tr>
    <td class='message'><img src=$image align=absmiddle> $message</td>
  </tr>
  <tr>
          <td class='foot' align=right>Posted by, $author on $date</td>
  </tr>
  <tr>
		   <td height='4' background=''></td>
  </tr></table>Comments";
?>
<table width=325 border=0 cellspacing=0 cellpadding=2>
<?php 
$file = "comments.txt";
$lines = file($file);
$lines = array_reverse($lines, TRUE);
	foreach($lines as $comment){
		$explode = explode('||', $comment);
		if($explode[0]==$entry){
			$explode[2] = vbcode($explode[2]);

				foreach($smilies as $key=>$value){
  					  $explode[2] = str_replace("$key", "$value", "$explode[2]");
				}
			echo "<tr>
          			<td class=title>$explode[1]</td>
  				</tr>
  				<tr>
  					<td class=message width=325 align=center>$explode[2]</td>
  				</tr>
 				 <tr>
					<td class=foot align=right>Posted by, $explode[3] on, $explode[4]</td>
  				</tr>
  				<tr>
		 			<td height='4' background=''></td>
  				</tr>";
				}
		}
?>
</table>
<form name="newmessage" method=POST action="commenter.php"><input type="hidden" name="entry" value=<?php echo $entry; ?>><center>
<table border=0 cellspacing=0 cellpadding=2><tr>
    <td class='title' colspan="2">Post A Comment</td>
  </tr>
  <tr>
    <td class='message'><b>Name:</b></td>
	<td class='message'><input type=text name=name size=15 class="form"></td>
  </tr>
  <tr>
    <td class='message' bgcolor="#595656"><b>Subject:</b></td>
	<td class='message' bgcolor="#595656"><input class="form" type=text name=subject size=15></td>
  </tr>
  <tr>
    <td valign="top" class='message'><b>Message:</b></td>
	<td class='message'><textarea cols="20" name=message rows="3" class="form"></textarea></td>
  </tr><tr>
          
        <td align=center class="form2" colspan="2"> <A HREF="javascript:setsmiley(':] ')" ONFOCUS="filter:blur()"><img src='images/smiles/biggrin.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley('[:) ')" ONFOCUS="filter:blur()"><img src='images/smiles/cool.gif' border=0 align='absmiddle'></a><A HREF="javascript:setsmiley(':o ')" ONFOCUS="filter:blur()"><img src='images/smiles/eek.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley(':( ')" ONFOCUS="filter:blur()"><img src='images/smiles/frown.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley(':| ')" ONFOCUS="filter:blur()"><img src='images/smiles/redface.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley('=) ')" ONFOCUS="filter:blur()"><img src='images/smiles/rolleyes.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley(':) ')" ONFOCUS="filter:blur()"><img src='images/smiles/smile.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley(':p ')" ONFOCUS="filter:blur()"><img src='images/smiles/tongue.gif'  border=0 align='absmiddle'></a><A HREF="javascript:setsmiley('8] ')" ONFOCUS="filter:blur()"><img src='images/smiles/turn.gif'  border=0 align='absmiddle'></a><br> </td>
  </tr>
  <tr>
          
        <td colspan="2" class='foot' align=center><input name="submit" type="image" value="submit" src="images/button.gif" align="absmiddle"></td>
  </tr>
  </table>
<a href="<?php echo $newspage; ?>">Back To News</a>
  </center>
</form></td>
  </tr>
</table>
</center></body></html>