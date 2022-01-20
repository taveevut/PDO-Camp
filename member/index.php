<?php include('../database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>แสดงรายการสมาชิก</title>
   <link rel="stylesheet" href="../styles/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>ข้อมูลรายการสมาชิก </h1>
            <p class="text-start">
               <a class="btn btn-outline-primary" href="./create.php">+สร้างรายการ</a>
            </p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">ลำดับที่</th>
                     <th scope="col">ชื่อผู้ใช้งาน</th>
                     <th scope="col">รหัสผ่าน</th>
                     <th scope="col">ชื่อ-สกุล</th>
                     <th scope="col">ชื่อเล่น</th>
                     <th scope="col">เบอร์โทรศัพท์</th>
                     <th scope="col">วันที่สร้าง</th>
                     <th scope="col">จัดการ</th>
                  </tr>
               </thead>
               <tbody>

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
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['password']; ?></td>
                        <td><?php echo $rows['fullname']; ?></td>
                        <td><?php echo $rows['nickname']; ?></td>
                        <td><?php echo $rows['tel']; ?></td>
                        <td><?php echo $rows['created_at']; ?></td>
                        <td>
                           <a class="btn btn-outline-secondary btn-sm" href="./view.php?id=<?php echo $rows['id']; ?>">ดูเพิ่มเติม</a>&nbsp;
                           <a class="btn btn-outline-warning btn-sm" href="./edit.php?id=<?php echo $rows['id']; ?>">แก้ไขรายการ</a>&nbsp;
                           <a class="btn btn-outline-danger btn-sm" href="./process.php?action=DELETE&id=<?php echo $rows['id']; ?>" onclick="return confirm('คุณต้องการลบรายนี้ใช่หรือไม่ !')">ลบรายการ</a>&nbsp;
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
      <nav aria-label="Page navigation example">
         <ul class="pagination">
            <?php
            if ($prev_page && $num_pages >= 5) {
            ?>
               <li class="page-item">
                  <a class="page-link" href="?page=1" aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                  </a>
               </li>
            <?php
            }

            if ($prev_page) {
            ?>
               <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $prev_page; ?>" aria-label="Previous">
                     &#10510;ก่อนหน้า
                  </a>
               </li>
               <?php
            }

            for ($n = 1; $n <= $num_pages; $n++) {
               $start_link = $page - 5;
               $end_link = $page + 5;

               if ($n != $page && $n <= $start_link) {
                  if (!isset($prev_dot)) {
                     $prev_dot = 1;
               ?>
                     <li class="page-item"><a class="page-link">...</a></li>
                  <?php
                  }
               } elseif ($n != $page && $n >= $start_link && $n <= $end_link) {
                  ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $n; ?>"><?php echo $n; ?></a></li>
               <?php
               } elseif ($n == $page) {
               ?>
                  <li class="page-item active"><a class="page-link" href="#"><?php echo $n; ?></a></li>
                  <?php
               } elseif ($end_link != $num_pages) {
                  if (!isset($next_dot)) {
                     $next_dot = 1;
                  ?>
                     <li class="page-item"><a class="page-link">...</a></li>
               <?php
                  }
               }
            }

            if ($page != $num_pages) {
               ?>
               <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $next_page; ?>" aria-label="Previous">
                     ถัดไป&#10509;
                  </a>
               </li>
            <?php
            }

            if (($page != $num_pages) && $num_pages >= 5) {
            ?>
               <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $num_pages; ?>" aria-label="Previous">
                     <span aria-hidden="true">&raquo;</span>
                  </a>
               </li>
            <?php
            }
            ?>
         </ul>
      </nav>
   </div>
</body>

</html>