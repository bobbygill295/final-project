<?php
/*connect.php
Bobby Gill
September 27, 2018
This script connects to the SQL database*/
define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8');
define('DB_USER','serveruser');
define('DB_PASS','gorgonzola7!');

try {
  $db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
  print "Error: " . $e->getMessage();
  die(); // Force execution to stop on errors.
}?>
