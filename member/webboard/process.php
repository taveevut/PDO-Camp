<?php
include('../../config/database.php');
include('../../config/constant.php');
include('../is_logged.php');
include('../../helpers/url_helper.php');

$action = $_GET['action'];
if ($action == "CREATE") {
   $stmt = $db_con->prepare("INSERT INTO questions (title, detail, member_id) VALUES (:title, :detail, :member_id)");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("member_id", $_SESSION["login_id"], PDO::PARAM_INT);
   $result = $stmt->execute();
   if ($result) {
      // echo "<script>alert(`บันทึกข้อมูลได้สำเร็จ`)</script>";
      redirect_admin('webboard/index.php');
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างบันทึกข้อมูล`)</script>";
   }
}

if ($action == "UPDATE") {
   $stmt = $db_con->prepare("UPDATE questions SET title = :title, detail = :detail WHERE id = :id");
   $stmt->bindParam("title", $_POST['title'], PDO::PARAM_STR);
   $stmt->bindParam("detail", $_POST['detail'], PDO::PARAM_STR);
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      redirect_admin('webboard/index.php');
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างปรับปรุงข้อมูล`)</script>";
   }
}

if ($action == "DELETE") {
   $stmt = $db_con->prepare("DELETE FROM questions WHERE id = :id ");
   $stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

   $result = $stmt->execute();
   if ($result) {
      redirect_admin('webboard/index.php');
   } else {
      echo "<script>alert(`เกิดข้อผิดพลาดระหว่างลบข้อมูล`)</script>";
   }
}
