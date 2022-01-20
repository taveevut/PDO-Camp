<?php include('../database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>แสดงรายการสมาชิก</title>
</head>

<body>
   <h1>ข้อมูลรายการสมาชิก </h1>
   <p>
      <a href="./create.php">+สร้างรายการ</a>
   </p>
   <table border="1" cellpadding="5">
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
      $limit = 15;
      $stmt = $db_con->prepare("SELECT * FROM members");
      $stmt->execute();
      $num_row = $stmt->rowCount();
      $num_pages = ceil($num_row / $limit);

      if (!isset($_GET['page'])) {
         $page = 1;
      } else {
         $page = $_GET['page'];
      }

      $prev_page = $page - 1;
      $next_page = $page + 1;

      $start = ($page - 1) * $limit;
      $no = $page > 1 ? $start + 1 : 1;

      $stmt = $db_con->prepare("SELECT *, CONCAT(name, ' ', surname) as fullname FROM members ORDER BY id DESC LIMIT $start, $limit");
      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($results as $rows) {
      ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $rows['username']; ?></td>
            <td><?php echo $rows['password']; ?></td>
            <td><?php echo $rows['fullname']; ?></td>
            <td><?php echo $rows['nickname']; ?></td>
            <td><?php echo $rows['tel']; ?></td>
            <td><?php echo $rows['created_at']; ?></td>
            <td>
               <a href="./view.php?id=<?php echo $rows['id']; ?>">ดูเพิ่มเติม</a>&nbsp;
               <a href="./edit.php?id=<?php echo $rows['id']; ?>">แก้ไขรายการ</a>&nbsp;
               <a href="./process.php?action=DELETE&id=<?php echo $rows['id']; ?>" onclick="return confirm('คุณต้องการลบรายนี้ใช่หรือไม่ !')">ลบรายการ</a>&nbsp;
            </td>
         </tr>
      <?php } ?>

   </table>
   <p>
      <?php
      if ($prev_page && $num_pages >= 5) {
         echo "<a href=\"?page=1\">หน้าแรก</a>&nbsp;&nbsp;";
      }

      if ($prev_page) {
         echo "<a href=\"?page=$prev_page\">&#10510;ก่อนหน้า</a>&nbsp;&nbsp;";
      }

      for ($n = 1; $n <= $num_pages; $n++) {
         if ($n == $page) {
            echo "<a><strong>$n</strong></a>&nbsp;&nbsp;";
         } else {
            echo "<a href=\"?page=$n\">$n</a>&nbsp;&nbsp;";
         }
      }

      if ($page != $num_pages) {
         echo "<a href=\"?page=$next_page\">ถัดไป&#10509;</a>&nbsp;&nbsp;";
      }

      if (($page != $num_pages) && $num_pages >= 5) {
         echo "<a href=\"?page=$num_pages\">สุกท้าย</a>&nbsp;&nbsp;";
      }
      ?>
   </p>

</body>

</html>