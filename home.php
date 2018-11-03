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
  <link rel="stylesheet" href="master.css" media="screen" title="no title">
  <meta charset="utf-8">
  <title>Online Wardrobe</title>
</head>
<body>
  <article class="">
    <h1>Seasonal Lookbook</h1>
    <span class = "newPost"><a href="newpost.php">New Look</a></span>

    <h2>Recently Posted Looks</h2>
    <?php if($statement->rowCount() === 0 ):?>
      <h3>There are no posts.</h3>
    <?php else:?>
      <?php for ($i=0; $i < 5; $i++): ?>

        <?php if ($row = $statement->fetch()): ?>
            <div class = "post">
        <h3><?=$row['title']?></h3>

        <span><a href="editpost.php?id=<?=$row['id']?>">edit</a></span>
        <?php $date = date_create($row['timestamp']) ?>
        <span class="timeStamp"><?= date_format($date, "F d, Y, g:i a")?></span>
        <p>
          <?= substr($row['content'], 0, 200) ?>
          <?php if (strlen($row['content']) > 200): ?>
              <a href="fullpost.php?id=<?=$row['id']?>">Read Full Post...</a>
          <?php endif ?>
        </p>
      </div>
      <?php endif ?>
      <?php endfor ?>
    <?php endif ?>
  </article>

</body>
</html>
