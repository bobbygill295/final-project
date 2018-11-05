<?php
/*home.php
Bobby Gill
September 27, 2018
This script outputs the 5 most recent posts, truncating the content if it is
longer than 200 characters*/
require  'connect.php';
$query = "SELECT * FROM posts ORDER BY timestamp DESC";
$statement = $db->prepare($query);
$statement->execute();
$date;
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="mister.css" media="screen" title="no title">
  <meta charset="utf-8">
  <title>Online Wardrobe</title>
</head>
<body id = "top">
    <div id="user">
	
		<a href="login.php">Login </a>|<a href="register.php"> Register</a>
	
	</div>
    
     <nav id = "mainnav">
		<ul>
				<li><a href="index.php">Home</a></li>
                <li><a href="home.php">Posts</a></li>
				<li><a href="membership.php">Membership</a></li>
				<li><a href="about.php">About</a></li>
		</ul>
	</nav>
  <article class="">
    <h1>Seasonal Lookbook</h1>
      <p>"Online Wardrobe" is a fashion, youth culture, and community website. It was inspired by street fashion websites and blogs such as The Sartorialist and The Cobrasnake and designed for users to post their own street-fashion photography, featuring themselves and their outfits.</p>
    
  </article>

</body>
</html>
