<!DOCTYPE html>
<html>
<body>

<h2>นักศึกษา ปวส.2 ม.6</h2>

<table style="width:100%" border =1>
<tr>
<th>รหัสนักศึกษา</th>
    <th>ชื่อ</th>
    <th>นามสกุล</th>
    <th>คะแนน</th>
    <th>หมายเหตุ</th>
  </tr>
<?php
$std = [["20","นายพินิจ","บุตตะ","80"],
["22","นายศุภณัฐ","โดนโยธษ","75"],
["23","นางสาวศศิธร","บัวระพา","70"]];


for ($row=0; $row <count($std) ; $row++) { 
    echo "<tr>";
    for ($col = 0; $col <= count($std); $col++) {
        echo "<td>".$std[$row][$col]."</td>";
    }
    echo "<td>"."</td>";
    echo "</tr>";
}
?>
</table>

