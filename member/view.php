<?php
include('../database.php');

$stmt = $db_con->prepare("SELECT * FROM members WHERE id = :id");
$stmt->bindParam("id", $_GET['id'], PDO::PARAM_INT);

$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ดูรายการสมาชิก</title>
   <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
   <h1>ดูรายการ <?php echo $rows['id']; ?> </h1>
   <table border="1" cellpadding="5">
      <tr>
         <th align="left">ชื่อผู้ใช้งาน</th>
         <td><?php echo $rows['username']; ?></td>
      </tr>
      <tr>
         <th align="left">รหัสผ่าน</th>
         <td><?php echo $rows['password']; ?></td>
      </tr>
      <tr>
         <th align="left">ชื่อ</th>
         <td><?php echo $rows['name']; ?></td>
      </tr>
      <tr>
         <th align="left">สกุล</th>
         <td><?php echo $rows['surname']; ?></td>
      </tr>
      <tr>
         <th align="left">ชื่อเล่น</th>
         <td><?php echo $rows['nickname']; ?>"</td>
      </tr>
      <tr>
         <th align="left">เบอร์โทรศัพท์</th>
         <td><?php echo $rows['tel']; ?>"</td>
      </tr>
   </table>
</body>

</html>