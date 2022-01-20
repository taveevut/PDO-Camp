<?php
include('../database.php');

$action = $_GET['action'];
if ($action == "CREATE") {
   $stmt = $db_con->prepare("INSERT INTO questions (title, detail, view, reply, member_id) VALUES (:title, :detail, :view, :reply, :member_id)");
   $stm->bindParam("title", $title, PDO::PARAM_STR);
   $stm->bindParam("detail", $detail, PDO::PARAM_STR);
   $stm->bindParam("view", $view, PDO::PARAM_INT);
   $stm->bindParam("reply", $reply, PDO::PARAM_STR);
   $stm->bindParam("member_id", $member_id, PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      // echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
   }
}

if ($action == "UPDATE") {
   $stmt = $db_con->prepare("UPDATE questions SET title = :title, detail = :detail, view = :view, reply = :reply, member_id = :member_id WHERE id = :id");
   $stm->bindParam("title", $title, PDO::PARAM_STR);
   $stm->bindParam("detail", $detail, PDO::PARAM_STR);
   $stm->bindParam("view", $view, PDO::PARAM_INT);
   $stm->bindParam("reply", $reply, PDO::PARAM_STR);
   $stm->bindParam("member_id", $member_id, PDO::PARAM_INT);
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างปรับปรุงข้อมูล`)</script>";
   }
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM questions WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      header("Location: ./index.php");
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างลบข้อมูล`)</script>";
   }
}
