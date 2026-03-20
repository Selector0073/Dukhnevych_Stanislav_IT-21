var input1 = prompt("Введіть число n:");
var n = Number(input1);
if (!isNaN(n)) {
    for (var i = 2; i <= n; i += 2) {
        console.log(i);
    }
}
else {
    console.error("Введено не коректне значення.");
}
