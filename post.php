<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body style="background-color: black;">
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
					</div>
				</ul>

				
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	
	<?php
	ob_start();
	session_start();
	include 'connect.php';

	if(isset($_POST['submit'])){
		$date=mysql_escape_string($_POST['date']);
		$title=mysql_escape_string($_POST['title']);
		$text1=mysql_escape_string($_POST['text1']);
		$text2=mysql_escape_string($_POST['text2']);
		$user_id=$_SESSION['user_id'];
		$user_name=$_SESSION['user_name'];

		if(!$title){
			echo "ERROR:Diary title is a required field.Please fill it.";
			exit();
		}
		$result=mysql_query("INSERT INTO content  VALUES('','".$_SESSION['user_id']."','".$_SESSION['user_name']."','$date','$title','$text1','$text2')",$connect);?>
		<h4 style="color: white;">Thank You!Post added successfully!<br>You will be redirected to home page after (2) seconds.</h4>
		<?php 
		echo "<meta http-equiv=Refresh Content=2;url=blog.php>";
	}
	else{
		?>
		

	<!-- <form method="post" action="post.php">
		Date:<input name="date" size="40" maxlength="255"></input><br>
		Title:<input name="title" size="40" maxlength="255">
		<br>
		Text1:<textarea name="text1" rows="7" cols="30"></textarea>
		<br>
		Text2:<textarea name="text2" rows="7" cols="30"></textarea>
		<br>
		<input type="submit" name="submit" value="Publish Post"></input>
	</form> -->
	<div style="background-color: black;">
		<div class="container">
			<div class="row">
				<form class="form-horizontal" method="post" action="post.php">
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="date">Date:</label>
						<div class="col-sm-5">
							<input type="date" name="date" class="form-control" id="date" placeholder="Enter date">
						</div>
					</div>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="title">Title:</label>
						<div class="col-sm-5">
							<input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
						</div>
					</div>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="date">Text1:</label>
						<div class="col-sm-5">
							<textarea name="text1" class="form-control" rows="7" cols="30"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="date">Text2:</label>
						<div class="col-sm-5">
							<textarea name="text2" class="form-control" rows="7" cols="30"></textarea>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
							<button style="background-color: blue; color: white;" type="submit" name="submit" class="btn btn-default">Publish Post</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<?php
}
?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>