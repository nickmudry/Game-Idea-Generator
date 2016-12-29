<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");
	$gameGenResult = mysql_query("SELECT * FROM stats where name='totalGenerated'") or die(mysql_error());
	$gamesGeneratedFetch = mysql_fetch_array($gameGenResult);
	$gamesGenerated = $gamesGeneratedFetch['primaryValue'];
	
	$user = $_GET['user'];
	$profileRequest = mysql_query("SELECT * FROM users where id='$user'");
	$profileFetch = mysql_fetch_array($profileRequest);
	
	?>
	
	<head>
	<title><?php echo($profileFetch['username']); ?> Profile Page - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Profile: <?php echo($profileFetch['username']); ?> <small>Profile Page Early Beta Preview</small></h1>
                
                <h3>Public Information</h3>
                <p><strong>Website:</strong> <?php echo($profileFetch['website']); ?></p>
                <p><strong>Twitter:</strong> <?php echo($profileFetch['twitter']); ?></p>
                <p><strong>Occupation:</strong> <?php echo($profileFetch['occupation']); ?></p>
                <p><strong>Biography:</strong> <?php echo($profileFetch['biography']); ?></p>
                
                <h3>Game Submissions</h3>
                <p><strong>Total Games:</strong> 16</p>
                <p><strong>Games Submitted:</strong> Wobbles, Codename Cygnus, Disco Dodgeball, Primal Carnage, Flappy Bird</p>
                
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
