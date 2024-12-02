<?php
require("./coonect.php");  // อันนี้เป็นไฟล์ไว้เชื่อม database ให้เปลี่ยนเป็นของมึง
$username = $_POST["username"]; // อันนี้ดึง username มาใช้ตั้งชื่อรูป

$Filename = $username."_Pic.png"; // บรรทัดนี้ไว้ ตั้งชื่อไฟล์ แล้วต่อท้ายด้วย _Pic.png
move_uploaded_file($_FILES["upload"]["tmp_name"],"../User_img/".$Filename);
//                                   ^                            ^            ^
//ตัวนี้จะเป็นตัว Name ="upload" ของ HTML |       ตัวนี้เป็นตำแหน่งที่จะเอาลง |  อันนี้ชื่อไฟล์ |



// ใน database ต้องมี column สำหรับใส่ชื่อไฟล์ด้วย แล้วเอาตัวแปล $Filename ไปใส่ในช่อง
$sql = "INSERT INTO users VALUES()";
$conn->query($sql); // ตัวนี้เป็นการสั่งให้ sql ทำงาน โดย $conn เป็นตัวเชื่อม database ตัวแปลจากไฟล์ connect.php

// header มีไว่ส่ง user ไปต่อ อัตโนมัติ ให้เขียนต่อ location: ../ชื่อไฟล์ที่จะให้ไป
header("location:");
?>