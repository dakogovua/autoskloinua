<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="general.css" rel="stylesheet" type="text/css">
</head>
<body><center><br><br>
<table class="maintable" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td>
<form method=POST action="redirect.php">
<table border=0 cellspacing=0 cellpadding=2><tr>
    <td class='title' colspan="2">Admin Login</td>
  </tr>
  <tr>
    <td class='message'><b>Name:</b></td>
	<td class='message'><input class="form" type=text name=username size=10></td>
  </tr>
  <tr>
    <td class='message'><b>Password:</b></td>
	<td class='message'><input class="form" type=password name=password size=10></td>
  </tr>
  <tr>
          <td colspan="2" class='foot' align=center><input name="submit" type="image" value="submit" src="images/button.gif" align="absmiddle"></td>
  </tr>
  </table>
  </form>
  </td>
  </tr>
</table>
</center>

</body>
</html>