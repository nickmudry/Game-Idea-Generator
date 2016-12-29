<?PHP
include ("includes/mysqlconnect.php");
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordEncrypt = md5($password);


if ($username != null && $passwordEncrypt != null && $email != null)
{
	$userRequest = mysql_query("INSERT INTO users (username, password, email) VALUES ('$username', '$passwordEncrypt', '$email')");	
	$registered = true;
}

if ($_COOKIE['userID'] != null)
{
	$loggedin = true;
}
else if ($_COOKIE['userID'] == null)
{
	$loggedin = false;
}
?>
<!DOCTYPE html>
<html>

<head>
<title>Register - Video Game Idea Generator</title>

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
    	if ($loggedin == false && $registered == false)
		{
			include("includes/register-panel.php");
		}
    
		else if ($loggedin == true) 
		{
			echo ("<div class='container'>");
			echo ("<div class='row'>");
			echo ("<div class='col-lg-12'>");
            echo("<h1>Already Logged In</h1>");
            echo("<p>You are already logged in, and cannot make another account.</p>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
		}
		
		else if ($loggedin == false && $registered == true)
		{
			echo ("<div class='container'>");
			echo ("<div class='row'>");
			echo ("<div class='col-lg-12'>");
            echo("<h1>Registered</h1>");
            echo("<p>You have successfully registered. Please <a href='login.php'>click here</a> to login.</p>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
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
