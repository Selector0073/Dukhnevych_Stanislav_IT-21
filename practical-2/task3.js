var input3 = prompt("Введіть число n:");
var n1 = Number(input3);
var result = 1;
var i = 1;
while (i <= n1) {
    result *= i;
    i++;
}
console.log("\u0424\u0430\u043A\u0442\u043E\u0440\u0456\u0430\u043B \u0447\u0438\u0441\u043B\u0430 ".concat(n1, " \u0434\u043E\u0440\u0456\u0432\u043D\u044E\u0454: ").concat(result));
