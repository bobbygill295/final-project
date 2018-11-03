<?php
/*update.php
Bobby Gill
September 27, 2018
This script creates an SQL update call that modifies the existing database entry,
based on the user entered values on editpost.php. It will also delete the post
if the user selects the delete button on the previous page*/
require 'connect.php';
if (isset($_POST["edit"])) {
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (strlen($title) < 1 || strlen($content) < 1) {
    echo "$title, $content";
    echo '<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="master.css" media="screen" title="no title">
    <meta charset="utf-8">
    <script>
    function goBack() {
      window.history.back()
    }
    </script>
    <title>My Blog - Error</title>
    </head>
    <body>
    <article>
    <h3>Your post was not long enough in either the title or content, please try again</h3>
    <button id="back" onclick="goBack()">Back</button>
    </article>
    </body>
    </html>';
  }
  else {

    $query = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    header("Location: home.php");
    exit();
  }
}
if (isset($_POST["delete"])) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $query = "DELETE FROM posts WHERE id = :id";
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  header("Location: home.php");
}

?>
