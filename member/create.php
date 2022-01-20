<?php include('../database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>สร้างรายการสมาชิก</title>
   <link rel="stylesheet" href="../styles/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-5 pt-5">
            <form method="POST" action="process.php?action=CREATE" class="rendered-form">
               <div class="card">
                  <div class="card-header">
                     <h1>สร้างรายการ</h1>
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">ชื่อผู้ใช้งาน</label><br>
                        <input type="text" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" name="username" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">รหัสผ่าน</label><br>
                        <input type="password" class="form-control" placeholder="ระบุรหัสผ่าน" name="password" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">ชื่อ</label><br>
                        <input type="text" class="form-control" placeholder="ระบุชื่อ" name="name" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">สกุล</label><br>
                        <input type="text" class="form-control" placeholder="ระบุสกุล" name="surname" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">ชื่อเล่น</label><br>
                        <input type="text" class="form-control" placeholder="ระบุชื่อเล่น" name="nickname">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">เบอร์โทรศัพท์</label><br>
                        <input type="tel" class="form-control" placeholder="ระบุเบอร์โทรศัพท์" name="tel">
                     </div>
                  </div>
                  <div class="card-footer">
                     <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                     <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>