// 計算總電阻
function calculateTotalResistance() {
    const resistors = document.getElementById("resistors").value.split(",").map(Number);
    let totalResistance = resistors.reduce((a, b) => a + b, 0); // 串聯電阻
    document.getElementById("result-resistance").textContent = "總電阻 (串聯): " + totalResistance + " Ω";
}

// 計算功率
function calculatePower() {
    const voltage = parseFloat(document.getElementById("voltage").value);
    const current = parseFloat(document.getElementById("current").value);
    if (!isNaN(voltage) && !isNaN(current)) {
        const power = voltage * current;
        document.getElementById("result-power").textContent = "消耗功率: " + power + " W";
    } else {
        document.getElementById("result-power").textContent = "請輸入有效的電壓和電流值";
    }
}