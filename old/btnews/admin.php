<?php
session_start();
$page = $_GET["page"];
$adate = date("D, F jS y");
include 'newsconfig.php';
function auth_user($name,$pass)
{
	$file_array = file('member.php');

	foreach($file_array as $line)
	{

		$explode = explode("||", $line);

		if($name == $explode[0] AND $pass == $explode[1])
		{
			return true;
		}
	}
}
function uncode($text){
	$text = preg_replace('/(\<b\>)(.+?)(\<\/b\>)/', '[b]\\2[/b]',$text);
	$text = preg_replace('/(\<i\>)(.+?)(\<\/i\>)/', '[i]\\2[/i]',$text);
	$text = preg_replace('/(\<u\>)(.+?)(\<\/u\>)/', "[u]\\2[/u]", $text);
	$text = preg_replace('/(\<font color=(.+?)\>)(.+?)(\<\/font\>)/', '[color=\\2]\\3[/color]',$text);
	$text = preg_replace('/(\<a href=\"mailto:(.+?)\"\>)(.+?)(\<\/a\>)/', "[email=\\2]\\3[/email]", $text);
	$text = preg_replace('/(\<a href=\"(.+?)\" target=\"\_blank\"\>)(.+?)(\<\/a\>)/', '[url=\\2]\\3[/url]',$text);
	return $text;
}
function shoutCode($text) {
	$text = str_replace("http://www.", "www.", $text);
	$text = str_replace("www.", "http://www.", $text);
	$text = str_replace("[url]http://","[url]",$text);
	$text = str_replace("[url=http://","[url=",$text);
	$text = preg_replace("/(http.*:\/\/.+)\s/U", "<a href=\"$1\">$1</a> ", $text);
	$text = preg_replace('/(\[b\])(.+?)(\[\/b\])/', '<b>\\2</b>',$text);
	$text = preg_replace('/(\[i\])(.+?)(\[\/i\])/', '<i>\\2</i>',$text);
	$text = preg_replace('/(\[u\])(.+?)(\[\/u\])/', "<u>\\2</u>", $text);
	$text = preg_replace('/(\[color=(.+?)\])(.+?)(\[\/color\])/', '<font color=\\2>\\3</font>',$text);
	$text = preg_replace('/(\[email\])(.+?)(\[\/email\])/', "<a href=\"mailto:\\2\">\\2 </a>", $text);
	$text = preg_replace('/(\[email=(.+?)\])(.+?)(\[\/email\])/', "<a href=\"mailto:\\2\">\\3</a>", $text);
	$text = preg_replace('/(\[url\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
	$text = preg_replace('/(\[url=\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
	$text = preg_replace('/(\[url=(.+?)\])(.+?)(\[\/url\])/', "<a href=\"http://\\2\" target=\"_blank\">\\3</a>", $text);
	$text = stripslashes($text);
	$text = str_replace("!!!!", "!", $text);
	$text = str_replace("
", "", $text);
	return $text;
}
if($page == "editing"){
	$form_name = "newmessage";
}else{
	$form_name = "message";
}
$jscript = "<SCRIPT language='JavaScript'> 
function simple_code(opentag,closetag,realtype){
	var yourname= prompt('Please Enter The Text That You Would Like '+realtype+'.', realtype);
	if ( (yourname==realtype) || (yourname==null) || (yourname=='') ) 
	{ 
	   alert('You Must Enter Some Text')
	}else{ 
		yourname = opentag + yourname + closetag;
		document.newmessage.$form_name.value = document.newmessage.$form_name.value + yourname;
		newmessage.$form_name.focus();
	}
}
function com_code(opentag,closetag,realtype,show){
	if(realtype=='Color'){
		var textmessage= 'Please Enter The Color That You Would Like.';
		var message= 'Please Enter The Text That You Would Like Colorized.';
	}else{
		var message= 'Please Enter The Text That You Would Like For Your Link.(optional)';
		var textmessage= 'Please Enter The Url To Your Link.';
	}
	var title= prompt(message, '');
	var alink= prompt(textmessage, show);
	if ( (alink==show) || (alink==null) || (alink=='') ) 
	{ 
	   alert('You Must Enter Some Text')
	}else{ 
		if(title==''){
			var finlink = opentag + ']' + alink + closetag;
		}else{
			var finlink = opentag + '=' + alink + ']' + title + closetag;
		}
		document.newmessage.$form_name.value = document.newmessage.$form_name.value + finlink;
		newmessage.$form_name.focus();
	}
}
 //-->
</SCRIPT>";
if(auth_user($_SESSION['username'],$_SESSION['password']))
{
	echo "<html><head><link href=\"general.css\" rel=\"stylesheet\" type=\"text/css\">$jscript</head></body><center><table class=maintable border=0 cellspacing=4 cellpadding=4>
		  <tr>
   			 <td>
				<table border=0 cellspacing=0 cellpadding=2>
 					 <tr>
        				  <td class=title>Welcome ".$_SESSION['username']." </td>
  					</tr>
  					<tr>
  						  <td class=message align=center>What Do You Want To Do ".$_SESSION['username']."?<br><a href='?page=post'>Post News</a> | <a href='?page=edit'>Edit News</a> | <a href='?page=view'>View News</a> | <a href='/'>Go Home</a> | <a href='login.php'>Logout</a></td>
					</tr>
  					<tr>
        			  <td class=foot align=right>$adate</td>
  					</tr></table></td>
 				 </tr>
			</table></center>";

}
 else
{
	die("<html><head><link href=\"general.css\" rel=\"stylesheet\" type=\"text/css\"></head><body><center><table border=0 cellspacing=4 cellpadding=4>
  <tr>
    <td class=maintable>
<table border=0 cellspacing=0 cellpadding=2>
  <tr>
          <td class=title>Sorry ".$_SESSION['username']." </td>
  </tr>
  <tr>
    <td class=message align=center>Either The Username (".$_SESSION['username'].") or the Password ($password) that you submitted was incorrect.<br><a href='login.php'>Login</a></td>
  </tr>
  <tr>
          <td class=foot align=right>$adate</td>
  </tr></td>
  </tr>
</table></table></center></body></html>");
}
$file = "news.txt";
$lines = file($file);
$count = count($lines);
if($page=="edit"){
	session_start();
	$lines = array_reverse($lines, TRUE);
	$i = count($lines) - 1;
	echo "<br><center><table border=0 cellspacing=4 cellpadding=4>
 	 <tr>
  	  <td class=maintable><form name='key1' method='post' action='?page=editing'>
		<table width=420 cellspacing='0' cellpadding='2'><tr><td class=title colspan=4>News Editing</td></tr>";
		foreach($lines as $news){
			list($date,$message,$author,$image,$subject,$line,$comment) = explode('||',$news);
			echo "<tr><td class=message rowspan=5 align=center>Edit<br><input type='radio' name='key' value=".$i--."></td>
				<td class=title><b>Subject:</b></td>
  				  <td class=title>$subject</td>
  				 </tr><tr><td class=message><b>Message:</b></td>
   				 <td class=message>$message</td>
  				 </tr><tr>
  				   <td class=message><b>Poster:</b></td>
					<td class=message align=center>$author</td>
				</tr><tr>
   				  <td class=message><b>Date:</b></td>
					<td class=message align=center>$date</td>
				</tr><tr>
 				    <td class=message><b>Image:</b></td>
					<td class=message align=center><img src=$image name='avatarpic' align='absmiddle' border=0></td>
				</tr>";
	}
	echo "<tr><td class=foot colspan=4 align=center><input name=submit type=image value=submit src=\"images/button.gif\" align=\"absmiddle\"></td></tr></table></form></td>
		 </tr>
		</table>";
}elseif($page=="editing"){
	session_start();
	$key = $_POST["key"];
	$entry_to_edit = $lines[$key];
	list($date,$message,$author,$image,$subject,$line,$comment) = explode('||',$entry_to_edit);
	$message = uncode($message);
	echo "<center><br><table border=0 cellspacing=4 cellpadding=4>
	  <tr>
 	   <td class=maintable>
	<form name='newmessage' method='post' action=\"?page=edited&key=$key\"><input type='hidden' name='newdate' 
	value=\"$date\"><input type='hidden' name='newauthor' value=\"$author\"><table cellspacing='0' 
	cellpadding='2' border='0'>
	<tr>
	<td colspan=4 class=title>Edit News ".$_SESSION['username']."</td></tr>
	<tr>
	<td class=message><b>Subject:</b></td>
 	   <td class=message><input class=form type='text' name='newsubject' size=15 id=subject 

	value=\"$subject\"></td>
 	  </tr><tr><td valign=top class=message><B>Message:</B></td>
 	   <td class=message><textarea class=form name='newmessage' cols=50 rows=10>$message</textarea> </td>
 	  </tr><tr>
 	    <td class=message><b>Image:</b><br><select name='newimage' onchange='document.images.avatarpic.src = 
	this[this.selectedIndex].value;' class=form>
	<option value=$image selected>Current</option>
	<option value='images/avatars/clear_avatar.gif'>None</option>";
	if ($handle = opendir($folder)) {
    	while (false !== ($file = readdir($handle))) { 
        	if ($file != "." && $file != "..") { 
            	echo "<option value='".$folder.$file."'>$file</option>\n"; 
        	} 
    	}
    	closedir($handle); 
	}
	echo "</select></td>
		<td class=message align=center><img src=$image name='avatarpic' align='left' 

	border=0> <table width='0%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[b]','[/b]', 'Bold')\" type='button' value=' B '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[i]','[/i]', 'Italic')\" type='button' value=' I '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[u]','[/u]', 'Underline')\" type='button' value=' U '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[color','[/color]','Color','')\" type='button' value='COLOR'> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[url','[/url]','URL','http://')\" type='button' value='URL'> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[email','[/email]','E-Mail','')\" type='button' value='MAIL'></td>
              </tr>
            </table> </td>
	</tr><tr><td class=foot colspan=4 align=center><input name=submit type=image value=submit src=\"images/button.gif\" 	align=\"absmiddle\"></td></tr></table></form></td>
 	 </tr>
	</table>";
}elseif($page=="edited"){
	$newdate = $_POST["newdate"];
	$newauthor = $_POST["newauthor"];
	$newsubject = $_POST["newsubject"];
	$newmessage = $_POST["newmessage"];
	$newimage = $_POST["newimage"];
	$key = $_GET['key'];
	session_start();
	if($newsubject==""){
		die("<center><br><b>You Must Submit A Subject</b></center>");
	}
	if($newmessage==""){
		die("<center><br><b>You Must Submit A Message</b></center>");
	}
	$entry_to_edit = $lines[$key];
	list($date,$message,$author,$image,$subject,$line,$comment) = explode('||',$entry_to_edit);
	$newmessage = shoutCode($newmessage);
	$entry_composed = "$newdate||$newmessage||$newauthor||$newimage||$newsubject||$line||$comment";
	$lines[$key] = $entry_composed;
	$fp = fopen($file,'w'); 
	foreach($lines as $entry) {
		$fw = fwrite($fp,$entry);
	}
	fclose($fp);
	echo "<center><br><table border=0 cellspacing=4 cellpadding=4>
 	 <tr>
	    <td class=maintable>
	<table border=0 cellspacing=0 cellpadding=2 width=400><tr>
          <td class='title'>$newsubject</td>
 	 </tr>
 	 <tr>
 	   <td class='message'><img src=$newimage align=absmiddle> $newmessage</td>
	  </tr>
	  <tr>
          <td class='foot' align='right'>Posted by, $newauthor on $newdate</td>
 	 </tr>
 	 <tr>
			   <td height='4' background=''></td>
 	 </tr></table></td>
 	 </tr>
	</table>";
}elseif($page=="post"){
	session_start();
	echo "<html>
	<head></style>
	<script language='Javascript'>
	<!--
	  if (document.images.avatarpic != null) {
		document.images.avatarpic.src = 

	document.forms[0].avatarsel[document.forms[0].avatarsel.selectedIndex].value;
	  }
	// -->
	</script>
	$jscript
	<link href=\"general.css\" rel=\"stylesheet\" type=\"text/css\">
	  <title>Post News</title>
	</head>
	<body><center><br><table border=0 cellspacing=4 cellpadding=4>
 	 <tr>
 	   <td class=maintable>
	<table cellspacing='0' cellpadding='2' border='0'>
	<tr><!-- Row 2 -->
	    <td class=title colspan=2>Post News ".$_SESSION['username']."</td></tr>
	<tr><!-- Row 2 -->
  	  <td class=message><form name='newmessage' method='post' action='?page=write'><b>Subject:</b></td>
  	  <td class=message><input class=form type='text' name='subject' size=10 id=subject></td>
  	 </tr>
 	 <tr><!-- Row 2 -->
 	   <td valign=top class=message><b>Message:</b></td>
 	   <td class=message><textarea class=form name='message' id=message cols=50 rows=10></textarea> </td>
 	  </tr>
 	  <tr>
  	   <td class=message><b>Image:</b><br><select name='image' onchange='document.images.avatarpic.src = 

	this[this.selectedIndex].value;' class=form>
	<option value='images/avatars/clear_avatar.gif'>None</option>";
	if ($handle = opendir($folder)) {
    	while (false !== ($file = readdir($handle))) { 
        	if ($file != "." && $file != "..") { 
            	echo "<option value='".$folder.$file."'>$file</option>\n"; 
        	} 
    	}
    	closedir($handle); 
	}
	echo "</select></td>
		<td class=message align=center><img src='images/avatars/clear_avatar.gif' name='avatarpic' align='left' 

	border=0> <table width='0%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[b]','[/b]', 'Bold')\" type='button' value=' B '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[i]','[/i]', 'Italic')\" type='button' value=' I '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:simple_code('[u]','[/u]', 'Underline')\" type='button' value=' U '> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[color','[/color]','Color','')\" type='button' value='COLOR'> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[url','[/url]','URL','http://')\" type='button' value='URL'> 
                </td>
                <td><input class='bbbutton' onClick=\"javascript:com_code('[email','[/email]','E-Mail','')\" type='button' value='MAIL'></td>
              </tr>
            </table> </td>
	</tr>
		<tr>
   	 <td class=foot colspan=2 align=center height=10><input name=submit type=image value=submit src=\"images/button.gif\" 	align=\"absmiddle\"></td></tr></table></form></td>
 	 </tr>
	</table>
	</body>
	</html>";
}elseif($page=="write"){
	$subject = $_POST["subject"];
	$message = $_POST["message"];
	$image = $_POST["image"];
	session_start();
	if($subject==""){
		die("<center><br><b>You Must Submit A Subject</b></center>");
	}
	if($message==""){
		die("<center><br><b>You Must Submit A Message</b></center>");
	}
	$message = shoutCode($message);
	$entry = "$adate||$message||".$_SESSION['username']."||$image||$subject||$count||0\n";
	$fp = fopen($file,'a'); 
	$fw = fwrite($fp,$entry);
	fclose($fp);
	echo "<center><br><table border=0 cellspacing=4 cellpadding=4>
	  <tr>
 	   <td class=maintable>
	<table width=400 border=0 cellspacing=0 cellpadding=2><tr>
          <td class='title'>$subject</td>
  	</tr>
  	<tr>
  	  <td class='message'><img src=$image align=absmiddle> $message</td>
 	 </tr>
 	 <tr>
 	         <td class='foot' align='right'>Posted by, ".$_SESSION['username']." on $adate</td>
 	 </tr>
 	 <tr>
			   <td height='4' background=''></td>
 	 </tr></table></td>
 	 </tr>
	</table>";
}elseif($page=="view"){
	echo "<br><center><table width='80%' border='0' cellspacing='0' cellpadding='2'>
  <tr>
    <td>";
include($newspage);
	echo "</td>
  </tr>
</table></center>";
}

?>
</table></body></html>