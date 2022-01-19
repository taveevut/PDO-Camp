<?php include('database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible"
         content="IE=edge">
   <meta name="viewport"
         content="width=device-width, initial-scale=1.0">
   <title>แสดงรายการสมาชิก</title>
</head>

<body>
   <h1>ข้อมูลรายการสมาชิก </h1>
   <p>
      <a href="./create.php">+สร้างรายการ</a>
   </p>
   <table border="1"
          cellpadding="5">
      <tr>
         <td>ลำดับที่</td>
         <td>ชื่อผู้ใช้งาน</td>
         <td>รหัสผ่าน</td>
         <td>ชื่อ-สกุล</td>
         <td>ชื่อเล่น</td>
         <td>เบอร์โทรศัพท์</td>
         <td>วันที่สร้าง</td>
         <td>จัดการ</td>
      </tr>

      <?php 
      $i = 1;
      $stmt = $db_con->prepare("SELECT *, CONCAT(name, ' ', surname) as fullname FROM members ORDER BY id DESC LIMIT 50");
      $stmt->execute();
      while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
      <tr>
         <td><?php echo $i++;?></td>
         <td><?php echo $rows['username'];?></td>
         <td><?php echo $rows['password'];?></td>
         <td><?php echo $rows['fullname'];?></td>
         <td><?php echo $rows['nickname'];?></td>
         <td><?php echo $rows['tel'];?></td>
         <td><?php echo $rows['created_at'];?></td>
         <td>
            <a href="#">ดูรายการ</a>&nbsp;
            <a href="#">แก้ไขรายการ</a>&nbsp;
            <a href="#">ลบรายการ</a>&nbsp;
         </td>
      </tr>
      <?php }?>

   </table>
</body>

</html>