<?php
/*insert.php
Bobby Gill
September 27, 2018
This script is called to insert a new database entry from newpost.php*/
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);

if (strlen($title) < 1 || strlen($content) < 1) {
  echo "$title, $content";
echo '<!DOCTYPE html>
  <html>
    <head>
    <link rel="stylesheet" href="mister.css" media="screen" title="no title">
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
require 'connect.php';
$query = "INSERT INTO posts(title, content, category_id) VALUES (:title, :content, :category)";
$statement = $db->prepare($query);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->bindValue(':category', $category, PDO::PARAM_INT);
$statement->execute();
header("Location: home.php");
}
?>