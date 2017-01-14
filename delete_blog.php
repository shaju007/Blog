<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
  <body>
    <?php
include ("connect.php");
$uid=$_GET['uid'];
$result=mysql_query("DELETE FROM content WHERE uid='$uid'",$connect);
echo "<b>Post Deleted!<br>You will be redirected to Mypost page after (2) seconds";
echo "<meta http-equiv=Refresh Content=2;url=mypost.php>";
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
  </body>
</html>

