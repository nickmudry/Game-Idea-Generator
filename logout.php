<?php

	if (isset($_COOKIE['userID']))
	{
		setcookie('userID', '', time()-7000000, '/');
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");

	?>
	
	<head>
	<title>Logout - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>
	
	

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Logging Out</h1>
                <p>You are now logged out of your account.</p>
                <p><a href="login.php">Click here</a> to return to the login screen, or <a href="index.php">click here</a> to return to the home page.</p>
            </div>
		</div>
        
        <?php include("includes/footer.php"); ?>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    
    

</body>

</html>
