<!DOCTYPE html>
<html lang="en">
<head>
   <title>Free Blog</title>
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
  $uid=$_GET['uid'];
  $result=mysql_query("SELECT * FROM content WHERE uid='$uid'",$connect);
  while($myrow=mysql_fetch_assoc($result)){?>
   <!-- echo "<b>Name:";
   echo $myrow['name']." / ";
   
   echo " <b>Posted on:";
   echo $myrow['date']."<br>"; -->
   <h3 style="color: #337AB7;font-family: Arial;">Name:<?php echo $myrow['name']; ?> / Posted On:<?php echo $myrow['date']; ?></h3>
<?php 
   echo "<b>Title:";
   echo $myrow['title'];
   echo "<hr>";
   echo wordwrap($myrow['text1'],51,"<br>\n") ;
   echo " <br>";
   echo wordwrap($myrow['text2'],51,"<br>\n") ;
   echo "<br><br><a href=\"javascript:self.history.back();\">Go back</a>";
 }
 ?>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript"></script>
</body>
</html>

