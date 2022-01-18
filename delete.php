<?php
include('./database.php');

$stm = $db_con->prepare("DELETE FROM members WHERE id = :id ");
$stm->bindParam("id", $id, PDO::PARAM_INT);

$id = 2;
 
$result = $stm->execute();
if($result){
   echo "<script>alert(`ลบข้อมูลได้สำเร็จ`)</script>";
}
else{
   echo "<script>alert(`เกิดข้อผิดพลาดระหว่างลบข้อมูล`)</script>";
}