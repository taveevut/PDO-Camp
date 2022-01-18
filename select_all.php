<?php
include('./database.php');

$stmt = $db_con->prepare("SELECT * FROM members ORDER BY id DESC");
$stmt->execute();
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo ("{$rows['id']}-{$rows['name']} <br>");
}