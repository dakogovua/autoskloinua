<?
#################################
# EasyNews version: 4.0
# EasyNews Admin
# Written and Devoloped by: Tim aka RR_Pilot
# A script by PHP Outburst
#################################

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                                                      // always modified
header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header ("Pragma: no-cache");

include "config2.php";

echo "<head><title>Easynews Admin</title></head><body>";

if(@$admin[$en_login_id] == "true")
{
echo "Welcome to easynews admin.\n<p>";
echo "<a href='admin.php?action=config'>Config Setting</a> | <a href='admin.php?action=users'>Users</a>";

echo "<p>";

if(isset($action))
{

    if($action == "config")
    {
        if(isset($submit))
        {
    $vars["ref"] = explode("/", substr(getenv("HTTP_REFERER"), 7));
    if($vars["ref"][0] != getenv("HTTP_HOST")) {
        echo "bad request.";
        exit;
    }
            //add new stuff
$headlines_num = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["headlines_num"]));
$headlines_format = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["headlines_format"]));
$offset = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["offset"]));
$news_num = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["news_num"]));
$allow_html = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["allow_html"]));
$news_format = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["news_format"]));
$linkback = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["linkback"]));
$title = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["title"]));
$body_bgcolor = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["body_bgcolor"]));
$text_color = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["text_color"]));
$text_font = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["text_font"]));
$text_size = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["text_size"]));
$text_smallsize = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["text_smallsize"]));
$link = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["link"]));
$vlink = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["vlink"]));
$alink = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["alink"]));
$h1_bgcolor = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["h1_bgcolor"]));
$h1_fontcolor = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["h1_fontcolor"]));
$h1_fontface = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["h1_fontface"]));
$h1_fontsize = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["h1_fontsize"]));
$t_border = str_replace("\"", "'", stripslashes($HTTP_POST_VARS["t_border"]));

$b = "<?
\$headlines = \"yes\";
\$headlines_num = $headlines_num;
\$headlines_format = \"$headlines_format\";
\$offset = $offset;
\$news_num = $news_num;
\$allow_html = \"$allow_html\";
\$news_format = \"$news_format\";
\$linkback = \"$linkback\";
\$title = \"$title\";
\$body_bgcolor = \"$body_bgcolor\";
\$text_color = \"$text_color\";
\$text_font = \"$text_font\";
\$text_size = \"$text_size\";
\$text_smallsize = \"$text_smallsize\";
\$link = \"$link\";
\$vlink = \"$vlink\";
\$alink = \"$alink\";
\$h1_bgcolor = \"$h1_bgcolor\";
\$h1_fontcolor = \"$h1_fontcolor\";
\$h1_fontface = \"$h1_fontface\";
\$h1_fontsize = \"$h1_fontsize\";
\$t_border = \"$t_border\";
\$d_body = \"<body bgcolor='$body_bgcolor' link='$link' vlink='$vlink' alink='$alink'>\";
\$d_font = \"<font face='$text_font' color='$text_color' size='$text_size'>\";
\$small_font = \"<font face='$text_font' color='$text_color' size='$text_smallsize'>\";
\$h1_font = \"<font face='$h1_fontface' color='$h1_fontcolor' size='$h1_fontsize'>\";
?>";
            $f = fopen("config.php", "w");
            fwrite($f, $b);
            fclose($f);
            echo "successfully edited!";
        } else {
        include "config.php";
        echo "<form action='admin.php?action=config' method=POST>
        Number of headlines: <input type=text size=30 name=headlines_num value=\"$headlines_num\"><br>
        headline format: <input type=text size=80 name=headlines_format value=\"$headlines_format\"><br>
        time offset in seconds: <input type=text size=30 name=offset value=\"$offset\"><br>
        Number of news posts: <input type=text size=30 name=news_num value=\"$news_num\"><br>
        allow html: <input type=text size=30 name=allow_html value=\"$allow_html\"><br>
        news format: <textarea cols=60 rows=6 name=news_format>$news_format</textarea><br>
        homepage url: <input type=text size=30 name=linkback value=\"$linkback\"><br>
        title: <input type=text size=30 name=title value=\"$title\"><br>
        background color: <input type=text size=30 name=body_bgcolor value=\"$body_bgcolor\"><br>
        text color: <input type=text size=30 name=text_color value=\"$text_color\"><br>
        font face: <input type=text size=30 name=text_font value=\"$text_font\"><br>
        font size: <input type=text size=30 name=text_size value=\"$text_size\"><br>
        font small size: <input type=text size=30 name=text_smallsize value=\"$text_smallsize\"><br>
        link color: <input type=text size=30 name=link value=\"$link\"><br>
        visited link color: <input type=text size=30 name=vlink value=\"$vlink\"><br>
        active link color: <input type=text size=30 name=alink value=\"$alink\"><br>
        header background color: <input type=text size=30 name=h1_bgcolor value=\"$h1_bgcolor\"><br>
        header font color: <input type=text size=30 name=h1_fontcolor value=\"$h1_fontcolor\"><br>
        header font face: <input type=text size=30 name=h1_fontface value=\"$h1_fontface\"><br>
        header font size: <input type=text size=30 name=h1_fontsize value=\"$h1_fontsize\"><br>
        table border color: <input type=text size=30 name=t_border value=\"$t_border\"><br>
        <p><input type=submit value=Edit name=submit>
        </form>";
        }
    } elseif($action == "users") {
        if(isset($submit))
        {
            $f = fopen("config2.php", "w");
            fwrite($f, stripslashes($users));
            fclose($f);
            echo "successfully edited!";
        } else {
        $f = fopen("config2.php", "r");
        $users =  fread($f, filesize("config2.php"));
        fclose($f);
        echo "<form action='admin.php?action=users' method=POST>
        Users:<br>
        <textarea cols=60 rows=15 name=users>$users</textarea>
        <p><input type=submit name=submit value='Edit'>
        </form>";
        }
    }
}

echo "</p>";

} else {

echo "you are not a admin or you are not logged in, goto the easynews.php to login.";

}

echo "</body>";
?>
