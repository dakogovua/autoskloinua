<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
header("Refresh:3;url=admin.php");
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
          <td class="maintable" align="center"><font color="#FFFFFF">You Are Being Redirected To The Admin Panel.<br>
            If Your Browser Does Not Forward You Automatically.<br> <a href="admin.php">Click 
            Here</a></font></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>

