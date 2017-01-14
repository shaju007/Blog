
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Free blog</title>
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
				<a class="navbar-brand" href="#">Free Blog</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">About us <span class="sr-only">(current)</span></a></li>
					<li><a href="contact.php">Contact</a></li>

				</ul>

				<ul class="nav navbar-nav navbar-right">

					<?php
					ob_start();
					session_start();
					include 'connect.php';
					if (isset($_POST['lemail']) && isset($_POST['lpwd'])) {
						$email=$_POST['lemail'];
						$password=$_POST['lpwd'];
						if(!empty($email)&&!empty($password)){
							$query="SELECT id,name FROM user WHERE email='$email' AND password='$password'";
							if($query_run=mysql_query($query)){
								$query_num_rows=mysql_num_rows($query_run);

								if($query_num_rows==0){?> 
									<h2 style="color: red;">Invalid username or password</h2>
								<?php }
								else if($query_num_rows>=1){
									$user_id=mysql_result($query_run, 0,'id');
									$user_name=mysql_result($query_run, 0,'name');
									$_SESSION['user_id']=$user_id;
									$_SESSION['user_name']=$user_name;
									header('Location:blog.php');
								}
							}

						}
						else{?>

							<h2 style="color: red;">You must apply email and password</h2>
						<?php }
					}

					?>
					<form class="form-inline" method="post" action="index.php">
						
						<div class="form-group">
							<label for="email" style="color: white;">Email:</label>
							<input type="email" class="form-control" name="lemail" id="lemail">
						</div>
						<div class="form-group">
							<label for="pwd" style="color: white;">Password:</label>
							<input type="password" class="form-control" name="lpwd" id="lpwd" style="margin-right: 15px;">
						</div>
						<button type="submit" class="btn btn-default">Log In</button>

						
					</form>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	
	<div style="background-color: black;">
		<div class="container">
			<div class="row">
				<div class="color col-sm-7"><img src="freeblog.jpg" class="img-responsive" alt="Cinque Terre" width="650" height="">
					<div style="height: 104px;"></div>
				</div>
				<!--sign up using php -->
				
				<div class="color col-sm-5"><h1 style="color: white;">Sign Up</h1><hr>
					<?php
					include 'connect.php';
					if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])) {
						$text=$_POST['name'];
						$emailreg=$_POST['email'];
						$passwordreg=$_POST['pwd'];
						if(!empty($text)&&!empty($emailreg)&&!empty($passwordreg)){
							$query="SELECT email FROM user WHERE email='$emailreg'";
							$query_run=mysql_query($query);
							if(mysql_num_rows($query_run)==1){?>

								<h2 style="color: red;">Email already exist</h2>
							<?php }
							else{
								$query="INSERT INTO user values('','$text','$emailreg','$passwordreg')";
								if ($query_run=mysql_query($query)) {?>
									<h2 style="color: green;">Registration Success.Now ou can log in</h2>

								<?php 
								echo "<meta http-equiv=Refresh Content=2;url=index.php>";
								 }
							}
						}
						else{?>
							<h2 style="color: red;">You must fill all the fields</h2>
						<?php }
					}
					?>
					<form class="form-horizontal" method="post" action="index.php">
						<div class="form-group">
							<label class="control-label col-sm-2" for="email" style="color: white;">Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  name="name" placeholder="Enter Name">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email" style="color: white;">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control"  name="email" placeholder="Enter email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="pwd" style="color: white;">Password:</label>
							<div class="col-sm-10"> 
								<input type="password" class="form-control"  name="pwd" placeholder="Enter password">
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">

							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default" name="submit">Submit</button>
							</div>
							<div style="height: 250px;"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript"></script>

	
</body>
</html>
