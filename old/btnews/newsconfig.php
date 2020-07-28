<?php 
## default number of news entries to show per page
$entriesshown = 5; 
## page where news is included
$newspage = "news.php";
## folder where the avatar folder is 
$folder = './images/avatars/'; 
// ^^ if u change the directory structure it should be http://www.yoursite.com/path/to/folder/

## file for news template
$template_file = './btnews/newstemplate.tpl';
## smilies to be changed and where the smilies are located
$smilies = array(":]"=>"<img src=\"images/smiles/biggrin.gif\" border=0 align='absmiddle'>", //smilies
				"[:)"=>"<img src=\"images/smiles/cool.gif\" border=0 align='absmiddle'>", //smilies
				":o"=>"<img src=\"images/smiles/eek.gif\" border=0 align='absmiddle'>", //smilies
				":("=>"<img src=\"images/smiles/frown.gif\" border=0 align='absmiddle'>", //smilies
				":|"=>"<img src=\"images/smiles/redface.gif\" border=0 align='absmiddle'>", //smilies
				"=)"=>"<img src=\"images/smiles/rolleyes.gif\" border=0 align='absmiddle'>", //smilies
				":)"=>"<img src=\"images/smiles/smile.gif\" border=0 align='absmiddle'>", //smilies
				":p"=>"<img src=\"images/smiles/tongue.gif\" border=0 align='absmiddle'>", //smilies
				"8]"=>"<img src=\"images/smiles/turn.gif\" border=0 align='absmiddle'>"); //smilies
## just a little title of your site
$sitetitle = "www.BigToach.com";
## max size of a persons name for comments 
$namlength = 20;
## message if persons name is too long
$toolongname = "<br><br>Sorry Your Name Is Retarded And Too Long.";
## max size of a persons subject for comments
$sublength = 40;
## message if persons subject is too long
$toolongsub = "<br><br>Sorry Your Subject Is Too Long.";
## max size of a persons comment
$messlength = 200;
## message if persons comment is too long
$messtoolong = "<br><br>We Don't Want Your Life Story Shorten Your Message.";
?>