<!DOCTYPE html>
<html lang="en">

<?PHP


$page = "index";

if (isset($_GET['share']))
	$share = $_GET['share'];
else
	$share = null;


include("includes/mysqlconnect.php");

if (isset($_GET['games'])) //If the $_GET for games isn't null, take what's in the $_GET and show it on page. 
	{
		$gameArray = explode("-", $_GET['games']); //Exploding the $_GET variable of games into an array. 
		$game1Result = mysql_query("SELECT * FROM games WHERE name='$gameArray[0]'") or die(mysql_error()); 
		$game1Fetch = mysql_fetch_array($game1Result); //Fetching the results of the first game. 
		$game2Result = mysql_query("SELECT * FROM games WHERE name='$gameArray[1]'") or die(mysql_error());
		$game2Fetch = mysql_fetch_array($game2Result); //Fetching the results of the second game.
		
		if ($gameArray[1] == "")
		{
			$result = mysql_query("SELECT * FROM games");
			$numRows = mysql_num_rows($result);
			
			$gameID2 = rand(1,$numRows);
			
			while ($game1Fetch['id'] == $gameID2)
			{
				$gameID2 = rand(1,$numRows);
			}
			
			$game2Result = mysql_query("SELECT * FROM games WHERE id='$gameID2'") or die(mysql_error());
			$game2Fetch = mysql_fetch_array($game2Result);
			
		}
		
		echo ("<head> <title>".$game1Fetch['name']." and ".$game2Fetch['name']. "- Video Game Idea Generator </title> </head>");
		
	}
else { 
//If there is nothing inputed, pick a random game ID from what's available. 
//TODO: Make this a random picker from the DB. 
	
	$result = mysql_query("SELECT * FROM games");
	$numRows = mysql_num_rows($result);

	$gameID1 = rand(1,$numRows); //This creates a random number based on the number of rows in the games table.
	$gameID2 = rand(1,$numRows);
	
	while ($gameID1 == $gameID2) //If it picks the same game both the first and second section, it will keep generating until it's a unique game. 
	{
		$gameID2 = rand(1,$numRows); 
	}
	
	$game1Result = mysql_query("SELECT * FROM games WHERE id='$gameID1'") or die(mysql_error());
	
	$game1Fetch = mysql_fetch_array($game1Result);

	$game2Result = mysql_query("SELECT * FROM games WHERE id='$gameID2'") or die(mysql_error());
	$game2Fetch = mysql_fetch_array($game2Result);
	

	
	

	?>
	
	<head>
	<title>Video Game Idea Generator</title>
	</head>
	
	<?PHP
	
	
	//Update Total Games Generated
}

	$game1Times = $game1Fetch['timesGenerated'] + 1;
	$game2Times = $game2Fetch['timesGenerated'] + 1;
	
	$game1Name = $game1Fetch['name'];
	$game2Name = $game2Fetch['name'];
	
	$game1GenUpdate = mysql_query("UPDATE games SET timesGenerated='$game1Times' WHERE name='$game1Name'");
	$game2GenUpdate = mysql_query("UPDATE games SET timesGenerated='$game2Times' WHERE name='$game2Name'");
	
	$gameGenResult = mysql_query("SELECT * FROM stats where name='totalGenerated'") or die(mysql_error());
	$gamesGeneratedFetch = mysql_fetch_array($gameGenResult);
	$gamesGenerated = $gamesGeneratedFetch['primaryValue'] + 1;

	$gameGenUpdate = mysql_query("UPDATE stats SET primaryValue='$gamesGenerated' WHERE name='totalGenerated'") or die(mysql_error());
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $game1Fetch['name'] ?> <small>Meets</small> <?php echo $game2Fetch['name'] ?> <small> <?PHP echo $game1Fetch['genre']; ?> <?PHP echo $game2Fetch['genre']; ?> Game</small>
                    <!--<small>Find inspiration for your next project!</small>-->
                </h1>
            </div>

        </div>
		
        <div class="row">
        <?PHP
        	if ($share == "true"){
	        	echo ("<center><h2>Click a button below to share this idea!</h2>");
	        	include_once("includes/sharing.php");
	        	echo ("</center>");

	        	$sharedResult = mysql_query("SELECT * FROM stats where name='totalShared'") or die(mysql_error());
	        	$shareFetch = mysql_fetch_array($sharedResult);
	        	$sharesTotal = $shareFetch['primaryValue'] + 1;

	        	mysql_query("UPDATE stats SET primaryValue='$sharesTotal' WHERE name='totalShared'");

	        	$game1Shares = $game1Fetch['timesShared'] + 1;
	        	$game2Shares = $game2Fetch['timesShared'] + 1;
        		mysql_query("UPDATE games SET timesShared='$game1Shares' WHERE name='$game1Name'");
				mysql_query("UPDATE games SET timesShared='$game2Shares' WHERE name='$game2Name'");

        	}
        ?>
        <div class="col-lg-6 col-md-6 portfolio-item">
                <a href="#project-one">
                   <div class="img-responsive"><iframe width="100%" height="400" src="http://www.youtube.com/embed/<?php echo $game1Fetch['video'] ?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                </a>
                <h3><a href="game.php?name=<?php echo $game1Fetch['name'] ?>"><?php echo $game1Fetch['name'] ?> <small><?php echo $game1Fetch['genre']?></small></a>
                </h3>
                <p><?php echo $game1Fetch['shortDescription'] ?></p>
            </div>

            <div class="col-lg-6 col-md-6 portfolio-item">
                <a href="#project-two">
                    <div class="img-responsive"><iframe width="100%" height="400" src="http://www.youtube.com/embed/<?php echo $game2Fetch['video']?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                </a>
                <h3><a href="game.php?name=<?php echo $game2Fetch['name'] ?>"><?php echo $game2Fetch['name'] ?> <small><?php echo $game2Fetch['genre']?></small></a>
                </h3>
                <p><?php echo $game2Fetch['shortDescription'] ?></p>
            </div>
        </div>
        
        <div class="row text-center">
			<h2><a href="index.php">Generate Video Game Idea</a></h2>
			<h3><a href="index.php?games=<?PHP echo $game1Fetch['name']?>-<?PHP echo $game2Fetch['name']?>&share=true">Share Idea</a></h3>
			<h3><a href="submit-game.php">Submit Your Game!</a></h3>
        </div>
        <hr>




        <?php include("includes/footer.php"); ?>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
