<!DOCTYPE html>
<html lang="en">

<?PHP

	include("includes/mysqlconnect.php");
	$gameGenResult = mysql_query("SELECT * FROM stats where name='totalGenerated'") or die(mysql_error());
	$gamesGeneratedFetch = mysql_fetch_array($gameGenResult);
	$gamesGenerated = $gamesGeneratedFetch['primaryValue'];

    $mostSharedRes = mysql_query("SELECT * FROM stats where name='totalShared'") or die (mysql_error());
	$mostSharedFetch = mysql_fetch_array($mostSharedRes);
    $mostShared = $mostSharedFetch['primaryValue'];

	$rowResult = mysql_query("SELECT * FROM games");
	$numRows = mysql_num_rows($rowResult);



?>
	
	<head>
	<title>Stats - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Game Idea Generation Stats</h1>
                <p><strong>Total Games Generated:</strong> <?php echo($gamesGenerated); ?></p>
                <!--<p>Ideas Shared: 34</p>-->
                <p><strong>Total Possible Combinations: </strong><?php echo($numRows * $numRows); ?></p>
                <p><strong>Most Popular Game:</strong> <?PHP 
                $result = mysql_query("SELECT * FROM  games ORDER BY timesGenerated DESC LIMIT 1"); 
                while ($row = mysql_fetch_array($result)){
                $leastGen = $row['name'];}?>
                <a href="game.php?name=<?PHP echo($leastGen); ?>"><?PHP echo($leastGen);?></a></p>
                <p><strong>Least Popular Game:</strong> <?PHP 
                $result = mysql_query("SELECT * FROM  games ORDER BY timesGenerated ASC LIMIT 1"); 
                while ($row = mysql_fetch_array($result)){
                $mostGen = $row['name'];}?>
                <a href="game.php?name=<?PHP echo($mostGen); ?>"><?PHP echo($mostGen);?></a></p>
                <p><strong>Total Games In Database: </strong><?php echo($numRows); ?></p>
                <p><strong>Total Games Shared: </strong><?php echo($mostShared); ?></p>
                <p><strong>Recently Added Game: </strong> <?PHP 
                $result = mysql_query("SELECT * FROM  games ORDER BY id DESC LIMIT 1"); 
                while ($row = mysql_fetch_array($result)){
                $recetnlyAdded = $row['name'];}?>
                <a href="game.php?name=<?PHP echo($recetnlyAdded); ?>"><?PHP echo($recetnlyAdded);?></a></p>
                
                <h2><small>Stats Coming Soon</small></h2>
                <p><strong>Most Popular Combination:</strong> ???</p>
                <p><strong>Most Shared Combination:</strong> ???</p>
                <p><strong>Games Added Today:</strong> ???</p>
                <p><strong>Newest Member:</strong> ???</p>
                <p><strong>Most Active Member:</strong> ???</p>
                
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
