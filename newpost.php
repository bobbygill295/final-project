<?php
/*newpost.php
Bobby Gill
September 27, 2018
This script creates a form that calls insert.php
This script requires authentication*/
require 'connect.php';
require 'authenticate.php'; 
$query = "SELECT * FROM category ORDER BY id DESC";
$statement = $db->prepare($query);
$statement->execute();
$date;
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="master.css" media="screen" title="no title">
  <meta charset="utf-8">
  <title>My Wardrobe - Post an Outfit</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>


  <form class="" action="insert.php" method="post">
    <h1>Lookbook</h1>
    <ul>
      <li>
        <label for="title">Title</label>
        <input type="text" name="title" value="" id="title">
      </li>
      <li>
        <label for="content">Content</label>
        <textarea name="content" rows = "10" cols = "90" id="content"></textarea>
      </li>
         <li>
        <label for="category">Category</label>
        <input type="text" name="category" value="" id="category">
      </li>
      <li>
        <input type="submit" value="Submit Blog">
      </li>
    </ul>


  </form>
</body>
</html>
