<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");

	?>
	
	<head>
	<title> Submit Game - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Submit Game</h1>
                <p>If there's a game that you don't see in our <a href="games.php">game's database</a>, or an error on a game, then please fill out the form below and we will update the database soon!</p>
                <p><i>You must include a <b>game name</b> and a <b>YouTube trailer</b> for your submission to go through.</i></p> 
              <form role="form" method="POST" action="submit.php">
	            <div class="row">
	              <div class="form-group col-lg-4">
	                <label for="input1">Game Name *</label>
	                <input type="text" name="game_name" class="form-control" id="input1">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input2">YouTube Trailer ID *</label>
	                <input type="text" name="youtube_id" class="form-control" id="input2">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input4">Genre</label>
	                <input type="text" name="game_genre" class="form-control" rows="6" id="input4">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input4">Developer</label>
	                <input type="text" name="game_developer" class="form-control" rows="6" id="input4">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input4">Publisher</label>
	                <input type="text" name="game_publisher" class="form-control" rows="6" id="input4">
	              </div>
	              <div class="form-group col-lg-4">
	                <label for="input4">Game's Website</label>
	                <input type="text" name="game_website" class="form-control" rows="6" id="input4">
	              </div>
	              <div class="form-group col-lg-12">
	                <label for="input3">Short Description</label>
	                <input type="text" name="game_description" class="form-control" id="input3">
	              </div>
	              <div class="form-group col-lg-12">
	                <label for="input3">Key Features</label>
	                <input type="text" name="game_features" class="form-control" id="input3">
	              </div>
	              <div class="form-group col-lg-12">
	                <label for="input3">Your Email</label>
	                <input type="text" name="email" class="form-control" id="input3">
	              </div>
	              <div class="clearfix"></div>
	              <div class="form-group col-lg-12">
	                <input type="hidden" name="save" value="contact">
	                <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
              </div>
            </form>
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
