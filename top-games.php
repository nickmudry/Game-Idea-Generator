<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");

	?>
	
	<head>
	<title>Top Video Game Ideas - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">       
            <div class="col-lg-12">
                <h1>Top 10 Game Ideas <small>By Votes</small></h1>
                <ul class="">
                	<li><a href="index.php?games=7 days to die-trid">7 Days to Die and Trid</a></li>
                    <li><a href="index.php?games=wobbles-lemmings">Wobbles and Lemmings</a></li>
                    <li><a href="index.php?games=7 days to die-trid">7 Days to Die and Trid</a></li>
                    <li><a href="index.php?games=wobbles-lemmings">Wobbles and Lemmings</a></li>
                </ul>
            </div>
            
            <div class="col-lg-12">
                <h1>Top 10 Games</h1>
                <ul class="">
                	<li><a href="game.php">Lemmings</a></li>
                	<li><a href="game.php">Wobbles</a></li>
                	<li><a href="game.php">Trid</a></li>
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
