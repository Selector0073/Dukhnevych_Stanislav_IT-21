var a = Number(prompt("Введіть перше число:"));
var b = Number(prompt("Введіть друге число:"));
var operator = prompt("Введіть операцію (+, -, *, /):");
var result1;
switch (operator) {
    case "+":
        result1 = a + b;
        break;
    case "-":
        result1 = a - b;
        break;
    case "*":
        result1 = a * b;
        break;
    case "/":
        result1 = a / b;
        break;
    default:
        result1 = 0;
        alert("Невідома операція");
}
alert("\u0420\u0435\u0437\u0443\u043B\u044C\u0442\u0430\u0442: ".concat(result1));
