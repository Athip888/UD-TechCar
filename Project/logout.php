<?php
session_start(); // เริ่มต้นเซสชัน

// ลบข้อมูลทั้งหมดในเซสชัน
session_unset();

// ทำลายเซสชัน
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้า login หรือหน้าแรกหลังจากออกจากระบบ
header("Location: index.php");
exit();
