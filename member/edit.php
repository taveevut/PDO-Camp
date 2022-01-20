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
   <title>แก้ไขรายการสมาชิก</title>
   <link rel="stylesheet" href="../styles/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-5 pt-5">
            <form method="POST" action="process.php?action=UPDATE&id=<?php echo $rows['id']; ?>" class="rendered-form">
               <div class="card">
                  <div class="card-header">
                     <h1>แก้ไขรายการ</h1>
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">ชื่อผู้ใช้งาน</label><br>
                        <input type="text" class="form-control" value="<?php echo $rows['username']; ?>" placeholder="ระบุชื่อผู้ใช้งาน" name="username" disabled required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">รหัสผ่าน</label><br>
                        <input type="password" class="form-control" value="<?php echo $rows['password']; ?>" placeholder="ระบุรหัสผ่าน" name="password" disabled required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">ชื่อ</label><br>
                        <input type="text" class="form-control" value="<?php echo $rows['name']; ?>" placeholder="ระบุชื่อ" name="name" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">สกุล</label><br>
                        <input type="text" class="form-control" value="<?php echo $rows['surname']; ?>" placeholder="ระบุสกุล" name="surname" required="required" aria-required="true">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">ชื่อเล่น</label><br>
                        <input type="text" class="form-control" value="<?php echo $rows['nickname']; ?>" placeholder="ระบุชื่อเล่น" name="nickname">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">เบอร์โทรศัพท์</label><br>
                        <input type="tel" class="form-control" value="<?php echo $rows['tel']; ?>" placeholder="ระบุเบอร์โทรศัพท์" name="tel">
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