<?php
include('./database.php');

$stmt = $db_con->prepare("SELECT * FROM members WHERE id = :id");
$stmt->bindParam("id", $id, PDO::PARAM_INT);

$id = 3;

$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

echo $rows['name'];