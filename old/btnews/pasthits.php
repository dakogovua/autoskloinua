<?php
$file = "hits.txt"; 
$hitdate = date("mdy"); 
$lines = file($file);
$lines[0] = $lines[0] + 1;
$lines[0] = "$lines[0]\n";
if($page=="past"){
$last = date("m", mktime (0,0,0,date("m")-1,date("d"),  date("Y")));
$lastn = date("M", mktime (0,0,0,date("m")-1,date("d"),  date("Y")));
$alast = date("m", mktime (0,0,0,date("m")-2,date("d"),  date("Y")));
$alastn = date("M", mktime (0,0,0,date("m")-2,date("d"),  date("Y")));
$blast = date("m", mktime (0,0,0,date("m")-3,date("d"),  date("Y")));
$blastn = date("M", mktime (0,0,0,date("m")-3,date("d"),  date("Y")));
$clast = date("m", mktime (0,0,0,date("m")-4,date("d"),  date("Y")));
$clastn = date("M", mktime (0,0,0,date("m")-4,date("d"),  date("Y")));
$dlast = date("m", mktime (0,0,0,date("m")-5,date("d"),  date("Y")));
$dlastn = date("M", mktime (0,0,0,date("m")-5,date("d"),  date("Y")));
$elast = date("m", mktime (0,0,0,date("m")-6,date("d"),  date("Y")));
$elastn = date("M", mktime (0,0,0,date("m")-6,date("d"),  date("Y")));
$flast = date("m", mktime (0,0,0,date("m")-7,date("d"),  date("Y")));
$flastn = date("M", mktime (0,0,0,date("m")-7,date("d"),  date("Y")));
$glast = date("m", mktime (0,0,0,date("m")-8,date("d"),  date("Y")));
$glastn = date("M", mktime (0,0,0,date("m")-8,date("d"),  date("Y")));
$hlast = date("m", mktime (0,0,0,date("m")-9,date("d"),  date("Y")));
$hlastn = date("M", mktime (0,0,0,date("m")-9,date("d"),  date("Y")));
$ilast = date("m", mktime (0,0,0,date("m")-10,date("d"),  date("Y")));
$ilastn = date("M", mktime (0,0,0,date("m")-10,date("d"),  date("Y")));
$jlast = date("m", mktime (0,0,0,date("m")-11,date("d"),  date("Y")));
$jlastn = date("M", mktime (0,0,0,date("m")-11,date("d"),  date("Y")));


echo '<html><head><title>Find A Date\'s Hit Count</title></head><body bgcolor=#000000><br><br><center><font color=white><b>Select A Date Please </b></font><form action="?page=old" method="post">
<select name="oldmonth">
	<option SELECTED value="'.date("m").'">'.date("M").'</option>
	<option value="'.$last.'">'.$lastn.'</option>
	<option value="'.$alast.'">'.$alastn.'</option>
	<option value="'.$blast.'">'.$blastn.'</option>
	<option value="'.$clast.'">'.$clastn.'</option>
	<option value="'.$dlast.'">'.$dlastn.'</option>
	<option value="'.$elast.'">'.$elastn.'</option>
	<option value="'.$flast.'">'.$flastn.'</option>
	<option value="'.$glast.'">'.$glastn.'</option>
	<option value="'.$hlast.'">'.$hlastn.'</option>
	<option value="'.$ilast.'">'.$ilastn.'</option>
	<option value="'.$jlast.'">'.$jlastn.'</option>
</select>
<select name="oldday">
	<option value="01">1</option>
	<option value="02">2</option>
	<option value="03">3</option>
	<option value="04">5</option>
	<option value="06">6</option>
	<option value="07">7</option>
	<option value="08">8</option>
	<option value="09">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>


</select><br><input name="Submit" type="submit"></form></center></body></html>';
}elseif($page=="old"){ 
$username = "".$oldmonth.$oldday."03";
function auth_user($name)
{
	$file_array = file('hits.txt');


	foreach($file_array as $line)
	{


		$explode = explode("||", $line);


		if($name == $explode[0])
		{
			echo "<html><head><title>Find A Date's Hit Count</title></head><body bgcolor=#000000><br><br><center><font color=white><b>There Were $explode[1]";
			return true;
		}
	}
}
if(auth_user($username))
{
echo " Hits That Day</center></html>";
}else{
echo "<html><head><title>Find A Date's Hit Count</title></head><body bgcolor=#000000><br><br><center><font color=white><b>Sorry We Have No Record Of That Day</center></html>";
}


}else{
	$data = $hitdate."||1\n"; 
	$key = count($lines) - 1; 
	$entry = $lines[$key];
	list($day, $count) = explode("||", $entry);
		if($day==$hitdate){ 
			$new = $count + 1;
			$entry_composed = $hitdate."||".$new."\n"; 
			$lines[$key] = $entry_composed; 
			$fp = fopen($file,'w'); 
			foreach($lines as $entry) {  
				$fw = fwrite($fp,"$entry");
			}
			fclose($fp);
			if($new==100 || $new==50 || $new==69){
				echo "ConGrats You're The ".$new."th Visitor Today, $lines[0] Total<br>";
			}elseif($new==2){
				echo "Bummer You're The 2nd Visitor Today, $lines[0] Total<br>";
			}else{
			echo "<center>$new Hits Today, $lines[0] Total<br><a href='pasthits.php?page=past' target='_self'>Find A Date's Hits</a></center>";
			}
		}else{
			$fp = fopen($file,'a');
			$fw = fwrite($fp,$data); 
			fclose($fp);
			echo "<center>You Are The First Visitor Today, $lines[0] Total<br><a href='pasthits.php?page=past' target='_self'>Find A Date's Hits</a></center>";
		}
}
?>
<?php 
$newfile = "online.txt";
$timeoutseconds = 300;
$timestamp = time();
$timeout = ($timestamp-$timeoutseconds);
$fp = fopen("$newfile", "a+");
$write = $REMOTE_ADDR."||".$timestamp."\n";
fwrite($fp, $write);
fclose($fp);
$online_array = array();
$file_array = file($newfile);
foreach($file_array as $newdata){
list($ip, $time) = explode("||", $newdata);
if($time >= $timeout){
array_push($online_array, $ip);
}
}
$online_array = array_unique($online_array);
$online = count($online_array);
if($online == "1"){
echo "You Are Alone";
}else{
echo "You Are 1 Of $online Visitors";
}
$dlfile = "/mnt/web_b/d40/s45/a000i0ua/www/downloads/scripts.txt";
$downloads = file($dlfile);
$amount = count($downloads);
echo "<center>$amount Total Script Downloads</center>";
?>