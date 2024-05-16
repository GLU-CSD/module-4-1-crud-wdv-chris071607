<?php
$loginError = false;
if (!isset($_SESSION['Sadmin_id']) || $_SESSION['Sadmin_id'] == "" || $_SESSION['Sadmin_id'] == '0' || 
	!isset($_SESSION['Sadmin_email']) || $_SESSION['Sadmin_email'] == "" || $_SESSION['Sadmin_email'] == '0' )
{
	$loginError = true;
}

if ($loginError)
{
	echo $_SESSION['Sadmin_id'];
	$_SESSION['Sadmin_email'];
	// exit('Sessie verlopen<meta http-equiv="refresh" content="0; URL='.BASEURL_CMS.'index.php">');
}