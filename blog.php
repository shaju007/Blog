<!DOCTYPE html>
<html>
<head>
	<title>User Post</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="blog.php">Free Blog</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="mypost.php">My Posts</a></li>
					


				</ul>

				<ul class="nav navbar-nav navbar-right">
					
					<div class="dropdown" style="float: right;" >
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 166px;">Your Profile
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu" >
					    <li><a href="#">view profile</a></li>
					    <li><a href="#">Settings</a></li>
					    <li><a href="logout.php">Logout</a></li>
					    
					  </ul>
					</div
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<h1><a href="post.php">Write your post</a></h1><br><hr>
	<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['user_id']))
	{
	    // not logged in
	    header('Location: index.php');
	    exit();
	}
	include ("connect.php");
	$user_id=$_SESSION['user_id'];
	$user_name=$_SESSION['user_name'];
	$result=mysql_query("SELECT * FROM content ORDER BY uid DESC ",$connect);
	while($myrow=mysql_fetch_assoc($result)){?>
		<!-- echo "<b>Name:";
		echo $myrow['name']." / ";
		
		echo " <b>Posted on:";
		echo $myrow['date']."<br>"; -->
		<h3 style="color: #337AB7;font-family: Arial;">Name:<?php echo $myrow['name']; ?> / Posted On:<?php echo $myrow['date']; ?></h3>
		<?php 
		echo "<b>Title:";
		echo $myrow['title'];
		?>

		<hr align=left width=160 style="border: 1px solid black;" />

		<?php 
		
		echo wordwrap($myrow['text1'],50,"<br>\n");
		echo "<br><a href=\"read_blog.php?uid=$myrow[uid]\">Read More...</a>
		<br>";?>
		<hr align=left style="border: 1px solid black;" />
		<?php 

	}
	?>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript"></script>
</body>
</html>
