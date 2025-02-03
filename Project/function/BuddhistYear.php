<?php
// ฟังก์ชันแปลงวันที่ (yyyy-mm-dd) จาก ค.ศ. เป็น พ.ศ.
function convertDateToBuddhist($date) {
    $dateObj = new DateTime($date);
    $buddhistYear = $dateObj->format("Y") + 543;
    return $dateObj->format("d/m/") . $buddhistYear;
}
function getMonthName($monthNumber) {
    switch($monthNumber) {
        case 1: return "มกราคม";
        case 2: return "กุมภาพันธ์";
        case 3: return "มีนาคม";
        case 4: return "เมษายน";
        case 5: return "พฤษภาคม";
        case 6: return "มิถุนายน";
        case 7: return "กรกฎาคม";
        case 8: return "สิงหาคม";
        case 9: return "กันยายน";
        case 10: return "ตุลาคม";
        case 11: return "พฤศจิกายน";
        case 12: return "ธันวาคม";
        default: return "เดือนไม่ถูกต้อง";
    }
}
?>
