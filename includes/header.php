<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Video Game Idea Generator. Blend your favorite indie games into new games and generate new game ideas, names and inspiration for your next game development project!">
    <meta name="author" content="Nick Mudry">
	
    <title>Video Game Idea Generator
    <?PHP     
    ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the 'Thumbnail Gallery' Template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">
    
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53cafcf3095c6c35"></script>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42417402-1', 'auto');
  ga('send', 'pageview');

</script>

<?PHP
	$uID = $_COOKIE['userID'];
	$userResult = mysql_query("SELECT * FROM users where id='$uID'");
	$userFetch = mysql_fetch_array($userResult);
?>
    
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Video Game Idea Generator</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="stats.php">Stats</a>
                    </li>
                    <li><a href="games.php">Games Directory</a>
                    </li>
                    <li><a href="submit-game.php">Submit Game</a>
                    </li>
                    <li><a href="about.php">About</a>
                    </li>
                    <?PHP 
	                if (isset($_COOKIE['userID']))
	                {
		              echo("<li><a href='profile.php?user=$uID'>".$userFetch['username']."</a></li>");
		              echo("<li><a href='logout.php'>Logout</a></li>");
	                }
	                if ($_COOKIE['userID'] == null)
	                {
	               		echo("<li><a href='login.php'>Login</a></li>");
		                echo("<li><a href='register.php'>Register</a></li>");
	                }
	                ?>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    