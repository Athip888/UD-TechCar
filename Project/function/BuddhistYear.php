<?php
// ฟังก์ชันแปลงวันที่ (yyyy-mm-dd) จาก ค.ศ. เป็น พ.ศ.
function convertDateToBuddhist($date) {
    $dateObj = new DateTime($date);
    $buddhistYear = $dateObj->format("Y") + 543;
    return $dateObj->format("d/m/") . $buddhistYear;
}
?>
