<?php
/*editpost.php
Bobby Gill
September 27, 2018
This script gathers the database entry based on the id
and fills the form with the database values, ready for editing
This script requires authentication*/
require 'connect.php';
require 'authenticate.php';


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();
$title = $row['title'];
$content = $row['content'];


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="mister.css" media="screen" title="no title">
  <meta charset="utf-8">
     <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <title>My Blog - Editing <?=$title?></title>
</head>
<body>
  <form class="" action="update.php" method="post">
    <h1>My Look</h1>
    <ul>
      <li>
        <input type="hidden" name="id" value="<?=$id?>">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?=$title?>" id="title">
      </li>
      <li>
        <label for="content">Content</label>
        <textarea name="content" rows = "10" cols = "90" id="content"><?=$content?></textarea>
      </li>
      <li>
        <input id = "submit" type="submit" value="Update Look" name = "edit">
        <input id = "delete" type="submit" value="Delete" name = "delete">
      </li>
    </ul>
  </form>
</body>
</html>
