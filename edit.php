<?php
include('database.php');


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
   <title>แก้ไขรายการสมาชิก</title>
</head>

<body>
   <h1>แก้ไขรายการ </h1>

   <form method="POST" action="process.php?action=UPDATE&id=<?php echo $rows['id']; ?>" class="rendered-form">
      <div class="formbuilder-text">
         <label>ชื่อผู้ใช้งาน</label><br>
         <input type="text" name="username" disabled value="<?php echo $rows['username']; ?>" required="required" aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>รหัสผ่าน</label><br>
         <input type="password" name="password" disabled value="<?php echo $rows['password']; ?>" required="required" aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>ชื่อ</label><br>
         <input type="text" name="name" value="<?php echo $rows['name']; ?>" required="required" aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>สกุล</label><br>
         <input type="text" name="surname" value="<?php echo $rows['surname']; ?>" required="required" aria-required="true">
      </div>
      <div class="formbuilder-text">
         <label>ชื่อเล่น</label><br>
         <input type="text" name="nickname" value="<?php echo $rows['nickname']; ?>">
      </div>
      <div class="formbuilder-text">
         <label>เบอร์โทรศัพท์</label><br>
         <input type="tel" name="tel" value="<?php echo $rows['tel']; ?>">
      </div>
      <div class="formbuilder-text"><br>
         <button type="submit">บันทึกข้อมูล</button>
         <button type="reset">ยกเลิก</button>
      </div>
   </form>
</body>

</html>