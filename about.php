<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");

	?>
	
	<head>
	<title> About - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>About Video Game Idea Generator</h1>
                <p>When most game developers pitch their games to co-workers, investors or even friends and family, they usually say it is a blend 
                between "Game 1" and "Game 2."</p>
                <p>To help with the game idea process, I created this simple tool that will pair two random games together, to hopefully give you a bit of inspiration to create your own game!</p>
                <p>This is obviously by no means a replacement for your own game ideas, just a fun tool that may help every once in a while during a game jam, or even your next big project.</p>
                <p>I plan to make routine updates here and there to this website, but for now please feel free to contribute to game database by submitting games you find missing on the game submission page. </p>
                <p>This project was inspired by the many other game idea generators out there on the web. However, most of them do not use real games as examples and I wanted to make one that did. Also, my previous game idea generator (can be found here) made funny game ideas, but didn't make anything practical, like this one can.</p>
            </div>
            
            <div class="col-lg-12">
                <h1>Upcoming Changes</h1>
                <ul class="">
                	<li><a href="#">An updated Games Directory with a more visual representation of the games.</a></li>
                    <li><a href="#">List of Recently Generated Game Ideas on Front Page (Last 5, 10, 15, etc.)</a></li>
                    <li><a href="#">Search functionality.</a></li>
                    <li><a href="profile.php?user=nick">User account & profile system.</a> <i>Click for a preview!</i></li>
                    <li><a href="#">Voting system for game combinations. Top voted combinations will be highlighted.</a></li>
                </ul>
            </div>
            
            <div class="col-lg-12">
                <h1>Recent Changes</h1>
                <ul class="">
                	<li><a href="games.php">You can choose one game to "pin" while you search for other games.</a></li>
                	<li><a href="submit-game.php">You can now submit games to be in the database.</a></li>
                	<li><a href="stats.php">Stats Page now displays basic statistics.</a></li>
                	<li><a href="games.php">Games Database now implemented.</a></li> 
                    <li><a href="index.php">Front-end design is now finished and all placeholder text is in-place and ready for database connections.</a></li>
                    <li><a href="index.php">Created the basic front-end of the website.</a></li>
                </ul>
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
