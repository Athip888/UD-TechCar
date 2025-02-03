<?php
require("function/BuddhistYear.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $request_id = $_POST['request_id'];
    $fullname = $_POST['fullname'];
    $user_signature = $_POST['user_signature'];
    $admin_signature = $_POST['admin_signature'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $destination = $_POST['destination'];
    $province = $_POST['province'];
    $purpose = $_POST['purpose'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $passengers = $_POST['passengers'];
    $admin_name = $_POST['admin_name'];
    $driver_name = $_POST['driver_name'];
    $cardetail = $_POST['cardetail'];
    $note_text = $_POST['note_text'];
list($year, $mon, $day) = explode('-', $departure_date);
list($year1, $mon1, $day1) = explode('-', $return_date);

// ลบศูนย์ข้างหน้า
$mon = ltrim($mon, '0');
$day = ltrim($day, '0');
$month = getMonthName($mon);
$year+=543;
$mon1 = ltrim($mon1, '0');
$day1 = ltrim($day1, '0');
$month1 = getMonthName($mon1);
$year1+=543;

}
require 'vendor/autoload.php'; // โหลด autoload ของ Composer
use PhpOffice\PhpWord\TemplateProcessor;

// โหลดไฟล์ template.docx
$templateProcessor = new TemplateProcessor('form.docx');

// แทนที่ค่าตัวแปรในเทมเพลต
$templateProcessor->setValue('fullname', $fullname);
$templateProcessor->setValue('department', $department);
$templateProcessor->setValue('position', $position);
$templateProcessor->setValue('destination', $destination);
$templateProcessor->setValue('province', $province);
$templateProcessor->setValue('purpose', $purpose);
//$templateProcessor->setValue('departure_date', $departure_date);
$templateProcessor->setValue('day', $day);
$templateProcessor->setValue('month', $month);
$templateProcessor->setValue('year', $year);
$templateProcessor->setValue('departure_time', $departure_time);
//$templateProcessor->setValue('return_date', $return_date);
$templateProcessor->setValue('return_time', $return_time);
$templateProcessor->setValue('day1', $day1);
$templateProcessor->setValue('month1', $month1);
$templateProcessor->setValue('year1', $year1);
$templateProcessor->setValue('passengers', $passengers);
$templateProcessor->setValue('admin_name', $admin_name);
$templateProcessor->setValue('driver_name', $driver_name);
$templateProcessor->setValue('cardetail', $cardetail);
$templateProcessor->setValue('note_text', $note_text);

// ตรวจสอบรูปภาพและแทรก
$templateProcessor->setImageValue('user_signature', 'user_signature/'.$user_signature);
$templateProcessor->setImageValue('admin_signature', 'user_signature/'.$admin_signature);

// กำหนดชื่อไฟล์ใหม่
$outputFile = 'request_form_filled.docx';
$templateProcessor->saveAs($outputFile);

// ตั้งค่า headers ให้เหมาะสมกับการดาวน์โหลด
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $outputFile . '"');
header('Content-Length: ' . filesize($outputFile));

// ส่งไฟล์ไปยังผู้ใช้
readfile($outputFile);

// ลบไฟล์หลังจากดาวน์โหลดเสร็จ
unlink($outputFile);
exit;
?>
