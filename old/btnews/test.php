<?php 
require('newsconfig.php');
$action = $_GET["action"];
$num = $_GET["num"];
$page = $_GET['page'];
if(!isset($action)){
	$action = 1;
}
if(!isset($num)){
	$num = $entriesshown; 
}
function news($action,$num,$smilies,$sitetitle,$template_file)
	{
		$template_lines = file($template_file);
		$new = $num * $action;
		$min = $new - $num;
		$file = "news.txt";
		$lines = file($file);
		$lines = array_reverse($lines, TRUE);
		$count = count($lines);
		$total = $count / $num;
		$total = ceil ($total);
		if($action > $total){
			die("<html><head><link href=\"general.css\" rel=\"stylesheet\" type=\"text/css\"></head>
				<body><center><table border=0 cellspacing=4 cellpadding=4>
  					<tr>
   						 <td class=maintable>
							<table border=0 cellspacing=0 cellpadding=2>
  								<tr>
         							 <td class=title>Sorry</td>
  								</tr>
  								<tr>
   									 <td class=message align=center>Sorry But We Dont Have That Many Entries</td>
  								</tr>
  								<tr>
       								<td class=foot align=right>$sitetitle</td>
								</tr>
						</td>
  					</tr>
				</table></table>
				</center></body></html>");
		}
		$link = $action + 1;
		$lines = array_slice($lines, $min, $num);
		foreach($lines as $news) {
			list($date,$message,$author,$image,$subject,$skey,$comment) = explode('||',$news);
			$replacements = array($date,$message,$author,$image,$subject,$skey,$comment);
			$patterns = array('{date}', '{message}', '{author}', '{image}', '{subject}', '{entry}', '{number_comments}');
			foreach($smilies as $key=>$value){
   				 $message = str_replace("$key", "$value", "$message");
			}
			foreach($template_lines as $temp_line){
				$temp_line = str_replace($patterns, $replacements, $temp_line);
				echo $temp_line;
			}
		}
		for ($i = 1; $i < $action; $i++) {
    		echo "<a href=\"?action=$i&num=$num\"><font size=+1><b>$i</b></font></a> ";
		}
		echo "<font size=+1 color=#ff000000><b>$action</b></font> ";
		for ($i = $link; $i <= $total; $i++) {
    		echo "<a href=\"action=$i&num=$num\"><font size=+1><b>$i</b></font></a> ";
		}
}
news($action,$num,$smilies,$sitetitle,$template_file);
?>