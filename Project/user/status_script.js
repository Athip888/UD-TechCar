function confirmCancel(request_id) {
    var confirmation = confirm("คุณแน่ใจหรือไม่ว่าต้องการยกเลิกคำร้องขอ?");
    if (confirmation) {
        // หากผู้ใช้กดยืนยัน, ส่งคำขอไปยัง PHP เพื่ออัปเดตสถานะ
        window.location.href = "status_pro.php?request_id=" + request_id;
    }
    return false;  // ป้องกันการทำงานของลิงก์
}
