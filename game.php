<!DOCTYPE html>
<html lang="en">

<?PHP

$page = "game";

include("includes/mysqlconnect.php");


if ($_GET['name'] != null) //If the $_GET for games isn't null, take what's in the $_GET and show it on page. 
	{
		$game = $_GET['name']; //Exploding the $_GET variable of games into an array. 
		$gameResult = mysql_query("SELECT * FROM games WHERE name='$game'") or die(mysql_error()); 
		$gameFetch = mysql_fetch_array($gameResult); //Fetching the results of the first game. 
	}
	
	$result = mysql_query("SELECT * FROM games");
	$numRows = mysql_num_rows($result);
	
	
	$relGame1ID = rand(1,$numRows);
	$relGame2ID = rand(1,$numRows);
	$relGame3ID = rand(1,$numRows);
	$relGame4ID = rand(1,$numRows);
	
	while ($relGame1ID == $relGame2ID || $relGame1ID == $relGame3ID || $relGame1ID == $relGame4ID 
	|| $relGame2ID == $relGame1ID || $relGame2ID == $relGame3ID || $relGame2ID == $relGame4ID
	|| $relGame3ID == $relGame1ID || $relGame3ID == $relGame2ID || $relGame3ID == $relGame4ID
	|| $relGame4ID == $relGame1ID || $relGame4ID == $relGame2ID || $relGame4ID == $relGame3ID
	|| $relGame1ID == $gameFetch['id'] || $relGame2ID == $gameFetch['id'] || $relGame3ID == $gameFetch['id'] || $relGame4ID == $gameFetch['id'])
	{
		$relGame1ID = rand(1,$numRows);
		$relGame2ID = rand(1,$numRows);
		$relGame3ID = rand(1,$numRows);
		$relGame4ID = rand(1,$numRows);
	}

	$relGame1Res = mysql_query("SELECT * FROM games WHERE id='$relGame1ID'") or die(mysql_error()); 
	$relGame2Res = mysql_query("SELECT * FROM games WHERE id='$relGame2ID'") or die(mysql_error()); 
	$relGame3Res = mysql_query("SELECT * FROM games WHERE id='$relGame3ID'") or die(mysql_error()); 
	$relGame4Res = mysql_query("SELECT * FROM games WHERE id='$relGame4ID'") or die(mysql_error()); 
	 
	$relGame1 = mysql_fetch_array($relGame1Res);
	$relGame2 = mysql_fetch_array($relGame2Res);
	$relGame3 = mysql_fetch_array($relGame3Res);
	$relGame4 = mysql_fetch_array($relGame4Res);
	
	?>
	
	<head>
	<title><?PHP echo ($gameFetch['name']); ?> - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
			
            <div class="col-lg-12">
                <h1 class="page-header"><?PHP echo ($gameFetch['name']); ?>
                    <small><?PHP echo ($gameFetch['genre']); ?></small>
                </h1>
            </div>

        </div>

        <div class="row">

            <div class="col-md-8">
                <!-<img class="img-responsive" src="http://placehold.it/750x500">
                <div class="img-responsive"><iframe width="100%" height="550" src="http://www.youtube.com/embed/<?php echo($gameFetch['video']);?>?rel=0" frameborder="0" allowfullscreen></iframe>
                <h3><a href="index.php?games=<?php echo($gameFetch['name']);?>">Generate Ideas With This Game</a></h3>
                </div>
                
            </div>

            <div class="col-md-4">
                <h3>Game Description</h3>
                <p><?php echo($gameFetch['shortDescription']); ?></p>
                <h3>Game Features</h3>
                <ul>
                    <?php echo($gameFetch['features']); ?>
                </ul>
                <h3>Additional Information & Stats</h3>
                <p><strong>Developer:</strong> <?PHP echo($gameFetch['developer']); ?></p>
                <p><strong>Publisher:</strong> <?PHP echo($gameFetch['publisher']); ?></p>
                <p><strong>Official Website:</strong> <a href="http://<?PHP echo($gameFetch['website']); ?>"><?PHP echo($gameFetch['website']); ?></a></p>
                <p><strong>Platforms:</strong> <?PHP echo($gameFetch['platforms']); ?></p>
                <p><strong>Times Generated:</strong> <?PHP echo($gameFetch['timesGenerated']); ?></p>
                <p><?PHP include_once("includes/sharing.php"); ?></p>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Other Great Games</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="game.php?name=<?PHP echo($relGame1['name']) ?>">
                    <div class="img-responsive"><iframe width="100%" height="200" src="http://www.youtube.com/embed/<?php echo($relGame1['video']);?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                    <h4><?PHP echo($relGame1['name']) ?></h4>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="game.php?name=<?PHP echo($relGame2['name']) ?>">
                    <div class="img-responsive"><iframe width="100%" height="200" src="http://www.youtube.com/embed/<?php echo($relGame2['video']);?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                    <h4><?PHP echo($relGame2['name']) ?></h4>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="game.php?name=<?PHP echo($relGame3['name']) ?>">
                    <div class="img-responsive"><iframe width="100%" height="200" src="http://www.youtube.com/embed/<?php echo($relGame3['video']);?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                    <h4><?PHP echo($relGame3['name']) ?></h4s>
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="game.php?name=<?PHP echo($relGame4['name']) ?>">
                    <div class="img-responsive"><iframe width="100%" height="200" src="http://www.youtube.com/embed/<?php echo($relGame4['video']);?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
                    <h4><?PHP echo($relGame4['name']) ?></h4>
                </a>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <?php include("includes/footer.php"); ?>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>