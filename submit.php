<!DOCTYPE html>
<html lang="en">

<?PHP

include("includes/mysqlconnect.php");

$game = $_POST['game_name'];
$youtube = $_POST['youtube_id'];
$genre = $_POST['game_genre'];
$developer = $_POST['game_developer'];
$publisher = $_POST['game_publisher'];
$website = $_POST['game_website'];
$description = $_POST['game_description'];
$features = $_POST['game_features'];
$submitter = $_POST['game_features'];
$submissionID = rand(0,9999999);

// multiple recipients
$to = 'nick@mudry.me';

// subject
$subject = "New Submission for Video Game Ideas ($submissionID)";

// message
$message = "
<html>
<body>
  <p>There is a new game submission for Video Game Ideas!</p>
  <p><b>Game Name:</b> $game </p>
  <p><b>Youtube ID:</b> $youtube </p>
  <p><b>Genre:</b> $genre </p>
  <p><b>Developer:</b> $developer </p>
  <p><b>Publisher:</b> $publisher </p>
  <p><b>Game Website:</b> $website </p>
  <p><b>Description:</b> $description </p>
  <p><b>Features:</b> $features </p>
  <p><b>Submitter:</b> $submitter </p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if ($submitter != ""){
$headers .= "From: $submitter" . "\r\n";
}

// Mail it

if ($game != "" && $youtube != ""){
mail($to, $subject, $message, $headers);
}
?>
	
	<head>
	<title>Confirmation - Video Game Idea Generator </title>
	</head>
	
	<?PHP
	include("includes/header.php");
	?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1><?PHP  
	                if ($game == "" || $youtube == "")
	                {echo ("Submission Failed");}
	                else 
	                {echo ("Submission Confirmation");}
                ?></h1>
                <p>
                <?PHP
                	if ($game == "" || $youtube == "")
	                	{echo ("Your submission was blank. Please fill out both the Game Name and Youtube fields and try your submission again. Thank you!");}
	                	else 
	                	{
		                		                              
                echo("You have successfully submitted a new game to the database. Please give us some time to review the submission and add it to the regular cycle of games.</p>
                <p>If you'd like to update any submission, please send an email to submissions@game-ideas.com with the submission ID number <strong>
                $submissionID </strong> in the subject line.</p>
                <p>For your review, your submission details are located below:</p>");
                }
                echo("  
	                <p><b>Game Name:</b> $game </p>
					<p><b>Youtube ID:</b> $youtube </p>
					<p><b>Genre:</b> $genre </p>
					<p><b>Developer:</b> $developer </p>
					<p><b>Publisher:</b> $publisher </p>
					<p><b>Game Website:</b> $website </p>
					<p><b>Description:</b> $description </p>
					<p><b>Features:</b> $features </p>
					<p><b>Submitter:</b> $submitter </p>
				");
                ?>
                
            </div>        
        <?php include("includes/footer.php"); ?>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    
    

</body>

</html>
