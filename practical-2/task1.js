var input = prompt("Будь ласка, введіть ваш вік:");
var age = Number(input);
if (age < 0) {
    alert("Ваш вік не може бути менше 0");
}
if (age < 18) {
    alert("Вам заборонено вхід");
}
else if (age >= 18 && age <= 65) {
    alert("Ласкаво просимо!");
}
else {
    alert("Будь ласка, будьте обережні!");
}
