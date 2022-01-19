<?php include('database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible"
         content="IE=edge">
   <meta name="viewport"
         content="width=device-width, initial-scale=1.0">
   <title>สร้างรายการสมาชิก</title>
</head>

<body>
   <h1>สร้างรายการ </h1>

   <form method="POST"
         action="process.php?action=CREATE"
         class="rendered-form">
      <div class="formbuilder-text">
         <label>ชื่อผู้ใช้งาน</label><br>
         <input type="text"
                name="username"
                required="required"
                aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>รหัสผ่าน</label><br>
         <input type="password"
                name="password"
                required="required"
                aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>ชื่อ</label><br>
         <input type="text"
                name="name"
                required="required"
                aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>สกุล</label><br>
         <input type="text"
                name="surname"
                required="required"
                aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>ชื่อเล่น</label><br>
         <input type="text"
                name="nickname">
      </div>
      <div class="formbuilder-text">
         <label>เบอร์โทรศัพท์</label><br>
         <input type="tel"
                name="tel">
      </div>
      <div class="formbuilder-text"><br>
         <button type="submit">บันทึกข้อมูล</button>
         <button type="reset">ยกเลิก</button>
      </div>
   </form>
</body>

</html>