<?
// Text DB Functions
// Author: Tim Hoeppner aka RR_Pilot

// basic file manipulation functions

// adds a record to a db putting the new record at the top
function add($record, $db, $new)
{
	global $upb;

	$b = "";
    $old = "";
    $n_id = 0;
    $ext = "";
	$every = explode("[NR]", $record);
	$e = count($every);
	if ($new == "no")
	{
		$f = fopen("$db.dat", "r");
		$old = fread($f, filesize("$db.dat"));
        $find = explode("\n", $old);
        $find2 = explode("<~>", $find[0]);
        $found = $find2[count($find2)-1];

        settype($found, "integer");
        $n_id = $found;

        fclose($f);
        $ext = "\n";
	}
	for($i=0;$i<$e;$i++)
	{
        $uni = $n_id+1;
        $every[$i] .= "<~>".$uni;
        $b .= format_record($every[$i], "no")."$ext";

	}
    $b .= $old;
	$f = fopen("$db.dat", "w");
	fwrite($f, $b);
	fclose($f);
	return $uni;
}

// adds a record to a db putting the new record at the bottom
function add_down($record, $db, $new)
{
	global $upb;

	$b = "";
    $old = "";
    $n_id = 0;
	$every = explode("[NR]", $record);
	$e = count($every);
	if ($new == "no")
	{
		$f = fopen("$db.dat", "r");
		$old = fread($f, filesize("$db.dat"));
        $b .= $old;
        $find = explode("\n", $old);
        $find2 = explode("<~>", $find[count($find)-1]);
        $found = $find2[count($find2)-1];

        settype($found, "integer");
        $n_id = $found;
		fclose($f);
	}
	for($i=0;$i<$e;$i++)
	{
		$uni = $n_id+1;
		$every[$i] .= "<~>".$uni;
        $b .= "\n";
        $b .= format_record($every[$i], "no");
	}
	$f = fopen("$db.dat", "w");
	fwrite($f, $b);
	fclose($f);
	return $uni;
}

// mass delete
function delete($id, $db)
{
    for($q=0;$q<count($id);$q++)
    {
        $c = listall("$db");
        $found = 0;
        $id[$q] = trim($id[$q]);
        settype($id[$q], "string");
        //we have to find the correct line from the id
        $c1 = count($c);
        for($p=0;$p<$c1;$p++)
        {
            $stuff = explode("<~>", $c[$p]);
            $field = count($stuff)-1;
            if($stuff[$field] == $id[$q])
            {
                $line = $p;
                $found = 1;
                break;
            }
        }
        if($found == 0)
        {
                echo "Id not found";
                exit;
        } else {

        $carray = $c1;
    	$con = "";
    	for ($i = 0; $i < $carray; $i++) {
    		if ($i == $line) {
    			$con .= "";
    		} else {
    			$con .= "$c[$i]\n";
    		}
    	}

        $f = fopen("$db.dat", "w");
   	    fwrite($f, $con);
        fclose($f);
        }
    }
}

// edit a record using the id of the record
function edit($id, $record, $db, $del)
{
/*
string: $id
String: $record, $db
Booleen: $del(yes or no)
*/

        settype($id, "string");
        $c = listall("$db");
        $found = 0;

        //we have to find the correct line from the id
        $c1 = count($c);
        for($p=0;$p<$c1;$p++)
        {
            $stuff = explode("<~>", $c[$p]);
            $field = count($stuff)-1;
            if($stuff[$field] == $id)
            {
                $line = $p;
                $found = 1;
                break;
            }
        }
        if($found == 0)
        {
                echo "Id not found";
                exit;
        } else {


        if ($del == "yes") {
		$carray = $c1;
		$con = "";
		for ($i = 0; $i < $carray; $i++) {
			if ($i == $line) {
				$con .= "";
			} else {
				$con .= "$c[$i]\n";
			}
		}
		$f = fopen("$db.dat", "w");
		fwrite($f, $con);
		fclose($f);
	} else {
		$new = format_record($record, "no");
		$c[$line] = $new;
		$carray = $c1;
		$con = "";
		for ($i = 0; $i < $carray; $i++) {
			$con .= "$c[$i]\n";
		}
		$f = fopen("$db.dat", "w");
		fwrite($f, $con);
		fclose($f);
	}

        }
}

// Formatting

// Format a record so its ready for the text file
function format_record($record, $newln)
{
/*
String: $record
Booleen: $newln(yes or no)
*/
	global $upb;

	$r = "";
	$field = explode("<~>", $record);
	$num_of_fields = count($field);
	for($i=0;$i<$num_of_fields;$i++)
	{
		if ($upb["html"] == 0)
		{
			//$field[$i] = strip_tags($field[$i]);
            $field[$i] = str_replace("<", "&lt;", $field[$i]);
            $field[$i] = str_replace(">", "&gt;", $field[$i]);
		}
		$field[$i] = stripslashes($field[$i]);
		$a = "<~>";
		if ($i == $num_of_fields-1)
		{
			if ($newln == "yes")
			{
				$a = "\n";
			} else {
				$a = "";
			}
		}
		$r .= eregi_replace("[\n\r]", "[NL]", $field[$i]). "$a";
	}
	return $r;
}

// Format record from db for the webpage
function undo_format($field)
{
/*
String: $field
*/
	$r = $field;
    $r = str_replace("\n", "", $r);
	$r = str_replace("[NL][NL]", " <br>\n", $r);
    $r = str_replace("[NL]", " <br>\n", $r);
    return $r;
}

function undo_format2($field)
{
/*
String: $field
*/
	$r = $field;
    $r = str_replace("\n", "", $r);
	$r = str_replace("[NL][NL]", " \n", $r);
    $r = str_replace("[NL]", " \n", $r);
    return $r;
}

// defines the fields using the *.def files
function def($rec, $db)
{
    $r = "";
    
    $f = fopen("$db.def", "r");
	$def = fread($f, filesize("$db.def"));
	fclose($f);
 
    $def = trim($def);
    $def = explode("<~>", $def);
    $rec = explode("<~>", $rec);
    
    for($i=0;$i<count($rec);$i++)
    {
        $r[$def[$i]] = $rec[$i];
        $r[$def[$i]] = undo_format($r[$def[$i]]);
    }

    return $r;
}

// Pulling records from the textdb

// Place all records in a array and return it
function listall($db)
{
/*
String: $db
*/
    $f = fopen("$db.dat", "r");
	$a = fread($f, filesize("$db.dat"));
	fclose($f);
    $a = trim($a);
    $a = explode("\n", $a);
/*    for($i=0;$i<count($a);$i++)
    {
        if($a[$i] = "" || $a[$i] = " ")
        {
            //nothing
        } else {
            $r[] = $a[$i];
        }
    }   */
	return $a;
}

// Get a specific record from the id field
function get($id, $db)
{
/*
Integer: $id
String: $db
*/
	$f = fopen("$db.dat", "r");
	$d = fread($f, filesize("$db.dat"));
	fclose($f);
	$d = explode("\n", $d);
$a = count($d);
$howmany = explode("<~>", $d[0]);
$field = count($howmany)-1;
$q = "$id";
for($i=0;$i<=$a;$i++)
{
	@$stuff = explode("<~>", $d[$i]);
	if(@$stuff[$field] == $q)
	{
		$a = $d[$i];
        break;
	}
}
	return $a;
}

// Misc functions

// figure it out
function ok_cancel($action, $text)
{
    global $font_m, $font_face, $font_color_main;

    echo "<form action='$action' METHOD=POST>
    <font size='$font_m' face='$font_face' color='$font_color_main'>
    $text
    <input type=submit name='verify' value='Ok'> <input type=submit name='verify' value='Cancel'>
    </font>
    </form>";
}

// encrypt a string such as a password for the textdb
function t_encrypt($text, $key)
{
    $crypt = "";
    for($i=0;$i<strlen($text);$i++)
    {
        $i_key = ord(substr($key, $i, 1));
        $i_text = ord(substr($text, $i, 1));
        $n_key = ord(substr($key, $i+1, 1));
        $i_crypt = $i_text + $i_key;
        $i_crypt = $i_crypt - $n_key;
        $crypt .= chr($i_crypt);
    }
    return $crypt;
}

function t_decrypt($text, $key)
{
    $crypt = "";
    for($i=0;$i<strlen($text);$i++)
    {
        $i_key = ord(substr($key, $i, 1));
        $i_text = ord(substr($text, $i, 1));
        $n_key = ord(substr($key, $i+1, 1));
        $i_crypt = $i_text + $n_key;
        $i_crypt = $i_crypt - $i_key;
        $crypt .= chr($i_crypt);
    }
    return $crypt;
}

// turns text links into a html link
function text_to_links ($data) {
  if(empty($data)) {
    return $data;
  }

  $lines = explode("\n", $data);

  while (list ($key, $line) = each ($lines)) {

    $line = eregi_replace("([ \t]|^)www\.", " http://www.", $line);
    $line = eregi_replace("([ \t]|^)ftp\.", " ftp://ftp.", $line);
    $line = eregi_replace("(http://[^ )\r\n]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $line);
    $line = eregi_replace("(https://[^ )\r\n]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $line);
    $line = eregi_replace("(ftp://[^ )\r\n]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $line);
    $line = eregi_replace("([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))", "<a href=\"mailto:\\1\">\\1</a>", $line);

    if (empty($newText))
      $newText = $line;
    else
      $newText .= "\n$line";
  }

  return $newText;
}

// i don't even know if this works :(
function compareString($string, $keyword)
{
/*
String: $string, $keyword
*/
	if(strpos($string, $keyword)>=0)
	{
		$flag=true;
	} else {
		$flag=false;
	}
	return $flag;
}
?>
