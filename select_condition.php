<?php
include('./database.php');

$stmt = $db_con->prepare("SELECT * FROM members WHERE name = :name  ORDER BY id DESC");
$stmt->bindParam("name", $name, PDO::PARAM_STR);

$name = "Taveevut";

$stmt->execute();
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo ("{$rows['id']}-{$rows['name']} <br>");
}