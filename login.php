<?PHP
include ("includes/mysqlconnect.php");
$username = $_POST['username'];
$password = $_POST['password'];
$passwordEncrypt = md5($password);


if ($username != null && $passwordEncrypt != null)
{
	$userRequest = mysql_query("SELECT * FROM users WHERE username='$username'");
	$userFetch = mysql_fetch_array($userRequest);
	//echo ($username. " " .$password. " " .$passwordEncrypt);
	//echo ("<br>" .$userFetch['username']. " " .$userFetch['password']);
	
	if (strcasecmp($username,$userFetch['username']) == 0 && $passwordEncrypt == $userFetch['password'])
	{
	//	echo ("username checked out");
		$inTwoMonths = 60 * 60 * 24 * 60 + time(); 
		setcookie('userID', $userFetch['id'], $inTwoMonths, '/');
	//	echo("Logged in as "); echo ($_COOKIE['userID']);
		$loggedin = true;
	}
}
else if ($_COOKIE['userID'] != null)
{
	$loggedin = true;
}
else 
{
	$loggedin = false;
}
?>
<!DOCTYPE html>
<html>

<head>
<title>Login - Video Game Idea Generator</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>


<?PHP include ("includes/header.php");
?>

<body>
    <?PHP 
		if ($loggedin == true) 
		{
			echo ("<div class='container'>");
			echo ("<div class='row'>");
			echo ("<div class='col-lg-12'>");
            echo("<h1>Logged In</h1>");
            echo("<p>You are now logging in!</p>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
		}
		else if ($loggedin == false)
		{
			include("includes/login-panel.php");
		}
		 
    
    ?>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
