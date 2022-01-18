<?php
include('./database.php');

$stm = $db_con->prepare("INSERT INTO members (username, password, name, surname, tel, nickname) VALUES (:username, :password, :name, :surname, :tel, :nickname)");
$stm->bindParam("username", $username, PDO::PARAM_STR);
$stm->bindParam("password", $password, PDO::PARAM_STR);
$stm->bindParam("name", $name, PDO::PARAM_STR);
$stm->bindParam("surname", $surname, PDO::PARAM_STR);
$stm->bindParam("tel", $tel, PDO::PARAM_STR);
$stm->bindParam("nickname", $nickname, PDO::PARAM_STR);

$username = "taveevut.n";
$password = "secret";
$name = "Taveevut";
$surname = "Nakomah";
$tel = "0862887987";
$nickname = "itopx";

$result = $stm->execute();
if($result){
   echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
}
else{
   echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
}