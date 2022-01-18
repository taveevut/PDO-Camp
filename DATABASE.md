# ออกแบบตารางฐานข้อมูล

- ตารางข้อมูลสมาชิก
```sql
CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'รหัสผ่าน',
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'ชื่อ',
  `surname` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'นามสกุล',
  `tel` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `nickname` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'ชื่อเล่น',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้าง',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ปรับปรุง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- จำลองข้อมูลสมาชิก
   - [members.sql](/members.sql)
<br>
<br>

---
<p align="center"> จัดทำโปรแกรมคอมพิวเตอร์พัฒนาระบบงานธุรกิจส่วนตัวและหน่วยงาน ใส่ใจคุณภาพ คุ้มราคา ส่งงานตรงเวลา<br>ติดต่อ 086-288-7987 (ท็อป) หรืออีเมล์    itopcybersoft@gmail.com<br>ติดตามผลงานได้ที่ <a href="https://itopcybersoft.com" target="_blank">www.itopcybersoft.com</a></p>
