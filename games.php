<!DOCTYPE html>
<html lang="en">

<?PHP

$page = "games";
$order = $_GET['order'];


include("includes/mysqlconnect.php");

$result = mysql_query("SELECT * FROM games WHERE active='1'") or die(mysql_error());

	?>
	
	<head>
	<title>Games Directory - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>


    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Games Directory</h1>
                <ul class="pager">
                <?PHP
                while($row = mysql_fetch_array($result)){
	                echo("<li><a href='game.php?name=".$row['name']."'>".$row['name']."</a> ");
	                echo("</li>");
                }
                
                ?>
                
                    <!--<li><a href="game.php?name=halo">Halo</a>
                    </li>
                    <li><a href="game.php?name=borderlands">Borderlands</a>
                    </li>
                    <li><a href="game.php?name=evolve">Evolve</a>
                    </li>
                    <li><a href="game.php?name=titanfall">Titanfall</a>
                    </li> -->
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
