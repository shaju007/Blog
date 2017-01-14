<!DOCTYPE html>
<html lang="en">
<head>
	<title>Free Blog</title>
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
				</div
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
	<?php
	include ("connect.php");
	if(isset($_POST['submit'])){
		$title=mysql_escape_string($_POST['title']);
		$text1=mysql_escape_string($_POST['text1']);
		$text2=mysql_escape_string($_POST['text2']);
		$uid=$_POST['uid'];


		$result=mysql_query("UPDATE content SET title='$title',text1='$text1',text2='$text2'   WHERE uid='$uid'",$connect);?>
		<h4 style="color: white;">Thank you!Post updated successfully!You will be redirected to homepage after (2) seconds</h4>
		<?php 
		echo "<meta http-equiv=Refresh Content=2;url=blog.php>";
	}
	elseif (isset($_GET['uid'])) {

		$result=mysql_query("SELECT * FROM content WHERE uid='$_GET[uid]'",$connect);
		while ($myrow=mysql_fetch_assoc($result)) {
			$title=$myrow['title'];
			$text1=$myrow['text1'];
			$text2=$myrow['text2'];

			?>
			
			<h3 style="color:white;">Edit Post:</h3>
			<!-- <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ;?>">
				<input type="hidden" name="uid" value="<?php echo $myrow['uid']?>"></input>
				Title:<input name="title" size="40" maxlength="255" value="<?php echo $title;?>"></input>
				<br>
				Text1:<textarea name="text1" rows="7" cols="30" ><?php echo $text1;?></textarea>
				<br>
				Text2:<textarea name="text2" rows="7" cols="30" ><?php echo $text2;?></textarea><br>
				<input type="submit" name="submit" value="Update Post"></input>
			</form> -->

			<div style="background-color: black;">
		<div class="container">
			<div class="row">
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ;?>">
					<input type="hidden" name="uid" value="<?php echo $myrow['uid']?>"></input>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="title" >Title:</label>
						<div class="col-sm-5">
							<input type="text" name="title" class="form-control" id="title" value="<?php echo $title;?>">
						</div>
					</div>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="date">Text1:</label>
						<div class="col-sm-5">
							<textarea name="text1" class="form-control" rows="7" cols="30" ><?php echo $text1;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label style="color: white;" class="control-label col-sm-2" for="date">Text2:</label>
						<div class="col-sm-5">
							<textarea name="text2" class="form-control" rows="7" cols="30"><?php echo $text2;?></textarea>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
							<button style="background-color: blue; color: white;" type="submit" name="submit" class="btn btn-default">Update Post</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
			<?php
			// echo "<br><br><a href=\"javascript:self.history.back();\">Go back</a>";
		}
	}
	?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript"></script>
</body>
</html>


