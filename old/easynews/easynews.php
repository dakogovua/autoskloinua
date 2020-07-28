<? 
#################################
# EasyNews version: 4.1
# EasyNews Main Page
# Written and Devoloped by: Tim aka RR_Pilot
# A script by PHP Outburst
#################################

##### DO NOT CHANGE ANYTHING BELOW THIS LINE

include "config.php";
include "config2.php";
include "func.inc.php";

$en_options["html"] = "";

  if(isset($QUERY_STRING))
  {
  $temporary_array = explode("&",$QUERY_STRING);
  $en_options["qstring"] = $temporary_array[0];
  unset($temporary_array[0]);
  if ($en_options["qstring"] <> "dologin") {
	if (isset($en_login_user) and isset($en_login_pass)){

$m = count($user)-1;
$tmp_query = $en_options["qstring"];
$en_options["qstring"] = "login";
for ($x = 0; $x <= $m; $x++) {
    if (isset($user[$x]) and isset($pass[$x])) {
    if ($en_login_user == $user[$x] and $en_login_pass == $pass[$x]){
    $en_options["qstring"] = $tmp_query;
    }
    } else {
    $en_options["html"] .= "could not find matching username and password for user: <b>$x</b>
    <br>please check the config file to make sure there is a username and pass word for each user number.";
    }
}

    } else {
    $en_options["qstring"] = "login";
    }
  }
  }
  else
  {
    if (isset($en_login_user) and isset($en_login_pass)){
$m = count($user)-1;
$en_options["qstring"] = "login";
for ($x = 0; $x <= $m; $x++) {
    if (isset($user[$x]) and isset($pass[$x])) {
    if ($en_login_user == $user[$x] and $en_login_pass == $pass[$x]){
    $en_options["qstring"] = "";
    }
    } else {
    $en_options["html"] .= "could not find matching username and password for user: <b>$x</b>
    <br>please check the config file to make sure there is a username and pass word for each user number.";
    }
}
    } else {
    $en_options["qstring"] = "login";
    }
  }

$en_options["html"] .= "
<head>
<title>$title</title>
</head>
$d_body
$d_font
<table width='90%' cellpadding='0' cellspacing='0' border='0'>
    <tr><td valign='top' bgcolor='$h1_bgcolor'> 
      <div align=center>$h1_font<b>$title</font></b></div>
    </td></tr>
	<tr><td>
		$small_font<div align=center><a href='easynews.php'>News Home</a> | <a href='easynews.php?addnews'>Submit News</a> | <a href='easynews.php?buildnews'>Build News/Headlines</a> | <a href='easynews.php?list'>Edit News</a> | <a href='easynews.php?viewnews'>Preview News/Headlines</a> | <a href='easynews.php?logoff'>Log off</a> | <a href='$linkback'>Go To Webpage</a></div></font>
	</td></tr>
</table>
";

if ($en_options["qstring"] == ""){
$en_options["html"] .= "Welcome to EasyNews download and enjoy! 
<p>To use the news outputed into the news file use this in your php script:
<br>include \"./easynews/newsfiles/news.txt\";
<br>to use the headlines:
<br>include \"./easynews/newsfiles/headlines.txt\";
<br>to use the archives:
<br>include \"./easynews/newsfiles/arc.txt\";
<br><br><font color=yellow>Note:</font> After everytime you submit news you must click on build news before you will be able to see it on news page.
<font size=$text_size><p>The folling options are avaiable at the link bar:
<p>News Home - Your looking at it
<br>Submit News - Submit a news post to the database
<br>Build News/Headlines - Builds news from database to the news file according to the format you specified
<br>Edit News - Edit News From the database
<br>Preview News/Headlines - Shows you what the news would look like on your page
<br>Log Off -  Log off the current user
<br>Go To Webpage - Goto the webpage you specified</font>
";
} elseif ($en_options["qstring"] == "login")
{
$en_options["html"] .= "
<table width='90%' cellpadding='0' cellspacing='0' border='0'>
    <tr><td valign='top' bgcolor='$h1_bgcolor' colspan='2'> 
      <div align=center>$h1_font<b>Login</font></b></div>
    </td></tr>
    <tr><td colspan='2'>
    You are not logged in, please do now. note: fields are case-sensitive meaning
    <p>Case is different from case<br><br>the default username and password for admin are: admin
    <br>for a normal user use: jake for username and doe for password
    </td></tr>
    <tr>
		<td align=right>
		Login Name:
		</td>
		<td align=left>
		<form action='easynews.php?dologin' method='post'>
		<input type=text name=u_name>
		</td>
	</tr>
	<tr>
		<td align=right>
		Password:
		</td>
		<td align=left>
		<input type=password name=u_pass>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
		<input type='submit' name='u_submit' value='Login'>
		</td>
	</tr>
</table>
</form>
";
} elseif ($en_options["qstring"] == "dologin") {
$en_options["html"] .= "
<table width='90%' cellpadding='0' cellspacing='0' border='0'>
    <tr><td valign='top' bgcolor='$h1_bgcolor'> 
      <div align=center>$h1_font<b>Logging in...</font></b></div>
    </td></tr>
    <tr><td>
";

	if ($u_submit){
		
		$tmp_flag = 0;
		$m = count($user)-1;
		$tmp_query = $en_options["qstring"];
		for ($x = 0; $x <= $m; $x++) {
			if (isset($user[$x]) and isset($pass[$x])) {
			if ($u_name == $user[$x] and $u_pass == $pass[$x]){
			$tmp_flag = 1;
			$qwe = $x;
			}
			} else {
			$en_options["html"] .= "could not find matching username and password for user: <b>$x</b>
			<br>please check the config file to make sure there is a username and pass word for each user number.";
			}
		}
				if ($tmp_flag == 1){
			setcookie("en_login_user","$u_name",time()+(3600*48));
			setcookie("en_login_pass","$u_pass",time()+(3600*48));
			setcookie("en_login_id","$qwe",time()+(3600*48));
			header("Refresh: easynews.php");
            $en_options["html"] .= "Successfully logged on!";
		} else {
			$en_options["html"] .= "Wrong UserName or Password, Please Try <a href='easynews.php?login'>Again</a>";
		}
	} else {
		$en_options["html"] .= "No values entered, Please Try <a href='easynews.php?login'>Again</a>";
	}

$en_options["html"] .= "
    </td></tr>
</table>
";
} elseif ($en_options["qstring"] == "logoff") {
$en_options["html"] .= "
<table width='90%' cellpadding='0' cellspacing='0' border='0'>
    <tr><td valign='top' bgcolor='$h1_bgcolor'> 
      <div align=center>$h1_font<b>Logging off...</font></b></div>
    </td></tr>
    <tr><td>
";
	setcookie("en_login_user","x",time()+1);
	setcookie("en_login_pass","x",time()+1);
    setcookie("en_login_id","x",time()+1);
    $en_options["html"] .= "Successfully logged off!";
} elseif ($en_options["qstring"] == "addnews") {

	$en_options["html"] .= "
	<form action='easynews.php?doaddnews' method='post'>
	<input type='hidden' name='n_name' value='$en_login_user'>

	Name: <b>$en_login_user</b>
	<br>Topic: <input type='text' name='n_topic'>
	<p>
	News:
	<br>
	<textarea cols='75' rows='15' name='n_news'></textarea>
	<br><input type='submit' name='n_submit' value='Add News'>
	</form>
	";
	
} elseif ($en_options["qstring"] == "doaddnews") {
	if ($n_submit) {
	    $vars["ref"] = explode("/", substr(getenv("HTTP_REFERER"), 7));
    if($vars["ref"][0] != getenv("HTTP_HOST")) {
        echo "bad request.";
        exit;
    }
	$en_date = date("M j, Y");
	$en_time = date("h:i:s",time()+$offset);

    if($allow_html == "no")
    {
        $upb["html"] = 0;
    } else {
        $upb["html"] = 1;
    }

    $contents = "$HTTP_POST_VARS[n_name]<~>$email_a[$en_login_id]<~>$HTTP_POST_VARS[n_topic]<~>$en_date<~>$en_time<~>$HTTP_POST_VARS[n_news]";
    add($contents, "./db/news", "no");

	$en_options["html"] .= "Your news has been successfully added!";
	
	}
} elseif ($en_options["qstring"] == "buildnews") {

    $contents = "";
    $contents_b = "";
    $id = 1;
$fd = listall("./db/news");
for($h=0;$h<count($fd);$h++){
        if ($h < $news_num) {
        if ($fd[$h] <> "") {
        $buffer = def($fd[$h], "./db/news");
        @$tmp_format = "<a name=$buffer[id]></a>$news_format";
        $tmp_format = @str_replace("<poster>", $buffer[name], $tmp_format);
        $tmp_format = @str_replace("<email>", $buffer[email], $tmp_format);
        $tmp_format = @str_replace("<topic>", $buffer[topic], $tmp_format);
        $tmp_format = @str_replace("<date>", $buffer[date], $tmp_format);
        $tmp_format = @str_replace("<time>", $buffer[time], $tmp_format);
        $tmp_format = @str_replace("<message>", $buffer[message], $tmp_format);
    
        $contents .= $tmp_format. "\n";
	    }
	    } else {
        if ($fd[$h] <> "") {
        $buffer = def($fd[$h], "./db/news");
        @$tmp_format = "<a name=$buffer[id]></a>$news_format";
        $tmp_format = @str_replace("<poster>", $buffer[name], $tmp_format);
        $tmp_format = @str_replace("<email>", $buffer[email], $tmp_format);
        $tmp_format = @str_replace("<topic>", $buffer[topic], $tmp_format);
        $tmp_format = @str_replace("<date>", $buffer[date], $tmp_format);
        $tmp_format = @str_replace("<time>", $buffer[time], $tmp_format);
        $tmp_format = @str_replace("<message>", $buffer[message], $tmp_format);
    
        $contents_b .= $tmp_format. "\n";
	    }
	}

	$id++;
}


	$en_file = fopen("./db/news.txt", "w");
	fwrite($en_file, $contents);
	fclose($en_file);
	$en_file = fopen("./db/arc.txt", "w");
	fwrite($en_file, $contents_b);
	fclose($en_file);
	
	
$contents = "";
$fd2 = listall("./db/news");
for($d=0;$d<count($fd2);$d++) {
    if ($d < $headlines_num) {
    if ($fd2[$d] <> "") {
    $buffer = def($fd2[$d], "./db/news");
    $tmp_format = $headlines_format;
    $tmp_format = @str_replace("<poster>", $buffer[name], $tmp_format);
    $tmp_format = @str_replace("<email>", $buffer[email], $tmp_format);
    $tmp_format = @str_replace("<topic>", $buffer[topic], $tmp_format);
   $tmp_format = @str_replace("<date>", $buffer[date], $tmp_format);
    $tmp_format = @str_replace("<time>", $buffer[time], $tmp_format);
    $tmp_format = @str_replace("<news_id>", $buffer[id], $tmp_format);
    
    $contents .= $tmp_format. "<Br>\n";
	}
	}
	$h++;
}


	$en_file = fopen("./db/headlines.txt", "w");
	fwrite($en_file, $contents);
	fclose($en_file);
	
	$en_options["html"] .= "Your news and headlines have been built from the database!";

} elseif ($en_options["qstring"] == "viewnews") {

	$en_file = fopen("./db/news.txt", "r");
	$contents = fread($en_file, filesize("./db/news.txt"));
	fclose($en_file);
	$en_file = fopen("./db/headlines.txt", "r");
	$contents2 = fread($en_file, filesize("./db/headlines.txt"));
	fclose($en_file);
	$en_options["html"] .= "
	Here is your headlines:
	<p>
	$contents2
	</p>
	Here is your news:
	<p>
	$contents
	</p>
	";
} elseif ($en_options["qstring"] == "list") {
	$en_options["html"] .= "<form action=easynews.php?delete method='POST'>
	<input type='submit' name='n_submit' value='Delete (selected)'>
	<table width=90% cellpadding=1 cellspacing=1 border=0 bgcolor=$t_border>
	<tr bgcolor=$body_bgcolor><th width=10%>Delete</th><th>Topic</th><th width=17%>Poster</th><th width=15%>Date</th></tr>";

	$fd = fopen("./db/news.dat", "r");
		while (!feof ($fd)) {
	    $buffer = fgets($fd, 4096);
	    if ($buffer <> "") {
        $buffer = def($buffer, "./db/news");
if ($admin[$en_login_id] == "true") {

		
	$en_options["html"] .= "
<tr bgcolor=$body_bgcolor><td align=center><input type=checkbox name=del[] value='$buffer[id]'></td>
<td><a href='easynews.php?get&id=$buffer[id]'>$buffer[topic]</a></td><td>$buffer[name]</td><td align=right>$buffer[date]</td></tr>";

	

} else {
		if ($buffer[0] == $en_login_user) {
		
	$en_options["html"] .= "
<tr bgcolor=$body_bgcolor><td align=center><input type=checkbox name=del[] value='$buffer[id]'></td>
<td>$buffer[topic]</td><td>$buffer[name]</td><td align=right>$buffer[date]</td></tr>";
	}
	

}
	}

		}
	fclose($fd);
$en_options["html"] .= "</table><input type='submit' name='n_submit' value='Delete (selected)'></form>";
} elseif ($en_options["qstring"] == "get") {
if(isset($id))
{
$en_options["html"] .= "
News id#$id:
";
$buffer = get($id, "./db/news");
$buffer = def($buffer, "./db/news");
@$buffer[message] =  str_replace("<br>", "", $buffer[message]);
if ($admin[$en_login_id] == "true") {

		
	$en_options["html"] .= "
	<p><form action='easynews.php?doedit' method='POST'>
	<input type=hidden name='id' value='$buffer[id]'>
	<input type='hidden' name='poster' value='$buffer[name]'>
	<input type='hidden' name='email' value='$buffer[email]'>
	Poster: <b>$buffer[name]</b>
	<br>Topic:<input type=text name=topic value=\"$buffer[topic]\">
	<input type=hidden name=date value='$buffer[date]'>
	<input type=hidden name=time value='$buffer[time]'>
	<p>
	News:<br>
	<textarea cols='60' rows='10' name='n_news'>$buffer[message]</textarea></p>
	<input type=checkbox name=del> Delete?
	<br><input type='submit' name='n_submit' value='Edit'>
	</form>
	</p>
	";

	

} else {
		if ($buffer[name] == $en_login_user) {
		
	$en_options["html"] .= "
	<p><form action='easynews.php?doedit' method='POST'>
	<input type=hidden name='id' value='$buffer[id]'>
	<input type='hidden' name='poster' value='$buffer[name]'>
	<input type='hidden' name='email' value='$buffer[email]'>
	Poster: <b>$buffer[name]</b>
	<br>Topic:<input type=text name=topic value=\"$buffer[topic]\">
	<input type=hidden name=date value='$buffer[date]'>
	<input type=hidden name=time value='$buffer[time]'>
	<p>
	News:<br>
	<textarea cols='60' rows='10' name='n_news'>$buffer[message]</textarea></p>
	<input type=checkbox name=del> Delete?
	<br><input type='submit' name='n_submit' value='Edit'>
	</form>
	</p>
	";
	} else {
        $en_options["html"] .= "You are not authorized to edit this news post.";
    }
	

}
} else {
$en_options["html"] .= "no id selected.";
}

} elseif ($en_options["qstring"] == "delete") {
    if(isset($del))
    {
        // delete
        $en_options["html"] .= "Deleting...";
        delete($del, "./db/news");
        $en_options["html"] .= "Done";
    } else {
        // nothing to delete
        $en_options["html"] .= "Nothing to delete";
    }
} elseif ($en_options["qstring"] == "doedit") {
	if (isset($n_submit)) {
         $vars["ref"] = explode("/", substr(getenv("HTTP_REFERER"), 7));
    if($vars["ref"][0] != getenv("HTTP_HOST")) {
        echo "bad request.";
        exit;
    }
	if (isset($del)) {
		$en_options["html"] .= "deleting...";
        edit($id, "", "./db/news", "yes");
        $en_options["html"] .= "done";
	} else {
    if($allow_html == "no")
    {
        $upb["html"] = 0;
    } else {
        $upb["html"] = 1;
    }
		$new = "$HTTP_POST_VARS[poster]<~>$HTTP_POST_VARS[email]<~>$HTTP_POST_VARS[topic]<~>$HTTP_POST_VARS[date]<~>$HTTP_POST_VARS[time]<~>$HTTP_POST_VARS[n_news]<~>$HTTP_POST_VARS[id]";
        edit($id, $new, "./db/news", "no");
			$en_options["html"] .= "
			News edited sucessfully!
			";
	}
	} else {
	$en_options["html"] .= "
	Nothing Submitted.
	";
	}
}

$en_options["html"] .= "
</font>
</body>
";

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
                                                      // always modified
header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header ("Pragma: no-cache");                          
echo $en_options["html"];
?>
