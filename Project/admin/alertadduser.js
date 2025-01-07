function showCustomAlert() {
    const alertBox = document.createElement('div');
    alertBox.id = 'customAlert';
    alertBox.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #f8f9fa;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: 1000;
    `;
    alertBox.innerHTML = `
        <p style="margin: 0 0 10px;">เพิ่มผู้ใช้สำเร็จgd!</p>
        <button onclick="closeCustomAlert()" style="
            background: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        ">ตกลง</button>
    `;
    document.body.appendChild(alertBox);
}

function closeCustomAlert() {
    const alertBox = document.getElementById('customAlert');
    if (alertBox) {
        alertBox.remove();
    }
}
