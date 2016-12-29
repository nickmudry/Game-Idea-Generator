<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add/Edit Games - Video Game Idea Generator</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Forms -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <?PHP

    include ("includes/mysqlconnect.php");
        
    $loggedInUserID = $_COOKIE['userID'];
	$userResult = mysql_query("SELECT * FROM users where id='$loggedInUserID'");
	$loggedInUser = mysql_fetch_array($userResult);
    
    $game = $_GET['id'];
    $gameResult = mysql_query("SELECT * FROM games WHERE id='$game'") or die(mysql_error());
   	$gameFetch = mysql_fetch_array($gameResult);

   	if ($gameFetch['id'] != null)
	{
    	$newGame = false;
	}
	else if($gameFetch['id'] == null)
	{
		$newGame = true;
	}
	
	$gameID = $gameFetch['id'];
    $gameName = $_POST['name'];
    $video = $_POST['video'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $platforms = $_POST['platforms'];
    $genre = $_POST['genre'];
    $website = $_POST['website'];
    $description = $_POST['description'];
    $active = $_POST['active'];
    $submitter = $_POST['gameSubmitter'];
    $admins = $_POST['gameAdmins'];
	
	if ($_POST['name'] != null && $newGame == false && $loggedInUser['role'] == "admin")
	{
		echo("Updating".$gameName.$video.$developer.$publisher.$platforms.$genre.$website.$description.$active.$submitter.$admins);
		$updateGame = mysql_query("UPDATE games SET name='$gameName' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET video='$video' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET developer='$developer' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET publisher='$publisher' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET platforms='$platforms' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET genre='$genre' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET website='$website' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET shortDescription='$description' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET active='$active' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET gameSubmitter='$submitter' WHERE id='$gameID'");
		$updateGame = mysql_query("UPDATE games SET gameAdmins='$admins' WHERE id='$gameID'");
	}
	if ($_POST['name'] != null && $newGame == true && $loggedInUser['role'] == "admin")
	{
		echo("Adding".$gameName.$video.$developer.$publisher.$platforms.$genre.$website.$description.$active.$submitter.$admins);
		if ($gameName != null && $video != null){
		$addGame = mysql_query("INSERT INTO games (name,video,developer,publisher,platforms,genre,website,shortDescription,active,gameSubmitter,gameAdmins) VALUES('$gameName','$video','$developer','$publisher','$platforms','$genre','$website','$description','$active','$submitter','$admins')");
		echo("ADDED GAME");
		}
	}
	$gameResult = mysql_query("SELECT * FROM games WHERE id='$game'") or die(mysql_error());
	$gameFetch = mysql_fetch_array($gameResult);
    
    $result = mysql_query("SELECT * FROM games");
	$numRows = mysql_num_rows($result);
    
    ?>

</head>

<body>

    <div id="wrapper">

        <?php include("includes/header.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?PHP if ($gameFetch['id'] != null) echo ("Edit ".$gameFetch['name']); else echo("Add Game"); ?><small><?PHP if ($loggedInUser['role'] == "admin") echo ("Admin Logged In"); else if ($loggedInUser['role'] != "admin") echo ("No Admin Privileges");?></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Game Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="games.php?id=<?php if ($newGame == false) {echo($_GET['id']);} else if ($newGame == true) {echo($numRows +1);}?>">
                                    	<div class="form-group">
                                            <label for="disabledSelect">Game Database ID</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="42" value="<?PHP if ($newGame == false) {echo($_GET['id']);} else if ($newGame == true) {echo($numRows +1);} ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Game Name</label>
                                            <input class="form-control" name="name" placeholder="Codename Cygnus" value="<?PHP echo($gameFetch['name']);?>">
                                            <p class="help-block">Enter the game's name without any special characters.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>YouTube Video ID</label>
                                            <input class="form-control" name="video" placeholder="JlD3Gt5BRt4" value="<?PHP echo($gameFetch['video']);?>">
                                            <p class="help-block">Enter the game's YouTube video ID. Do not include the full URL.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Developer</label>
                                            <input class="form-control" name="developer" placeholder="Reactive Studios" value="<?PHP echo($gameFetch['developer']);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Publisher</label>
                                            <input class="form-control" name="publisher" placeholder="Reactive Studios" value="<?PHP echo($gameFetch['publisher']);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Platforms</label>
                                            <input class="form-control" name="platforms" placeholder="iOS, Android, Kindle Fire" value="<?PHP echo($gameFetch['platforms']);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <input class="form-control" name="genre" placeholder="Interactive Radio Drama" value="<?PHP echo($gameFetch['genre']);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input class="form-control" name="website" placeholder="CodenameCygnus.com" value="<?PHP echo($gameFetch['website']);?>">
                                            <p class="help-block">Enter the game's website without "www" or "http://"</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Game Description</label>
                                            <textarea class="form-control" name="description" rows="3" value=""><?PHP echo($gameFetch['shortDescription']);?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Game Active</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="active" value="1" <?PHP if($gameFetch['active'] != 0) echo("checked");?>>Active
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                   <!-- </form> -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <!--<h1>Additional Info</h1>
                                    <form role="form" method="post" action="games.php">-->
                                            <div class="form-group">
                                                <label for="disabledSelect">Times Generated</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="251" value="<?PHP echo($gameFetch['timesGenerated']);?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Game Submitter</label>
                                                <input class="form-control" name="gameSubmitter" type="text" placeholder="Nick" value="<?PHP echo($gameFetch['gameSubmitter']);?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Game Admins</label>
                                                <input class="form-control" name="gameAdmins" type="text" placeholder="Nick, Steve, Erik" value="<?PHP echo($gameFetch['gameAdmins']);?>" >
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
