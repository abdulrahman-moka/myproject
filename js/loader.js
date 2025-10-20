var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72; // بداية الرسم من الأعلى
var cw = ctx.canvas.width;
var ch = ctx.canvas.height;
var diff;

function progressSim() {
    diff = ((al / 100) * Math.PI * 2); // النسبة على شكل زاوية

    ctx.clearRect(0, 0, cw, ch); // يمسح اللوحة قبل الرسم

    // الدائرة الخلفية (رمادية)
    ctx.beginPath();
    ctx.arc(cw / 2, ch / 2, 70, 0, Math.PI * 2, false);
    ctx.strokeStyle = "#e6e6e6";
    ctx.lineWidth = 10;
    ctx.stroke();

    // الدائرة المتقدمة (ملونة)
    ctx.beginPath();
    ctx.arc(cw / 2, ch / 2, 70, start, diff + start, false);
    ctx.strokeStyle = "#00bfff"; // اللون
    ctx.lineWidth = 10;
    ctx.stroke();

    // كتابة النسبة
    ctx.fillStyle = "#000";
    ctx.font = "20px Arial";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(al + "%", cw / 2, ch / 2);

    if (al >= 100) {
        clearTimeout(sim);
    }
    al++;
}

var sim = setInterval(progressSim, 50); 