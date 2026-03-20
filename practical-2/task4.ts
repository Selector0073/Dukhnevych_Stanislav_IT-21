const a: number = Number(prompt("Введіть перше число:"));
const b: number = Number(prompt("Введіть друге число:"));
const operator: string | null = prompt("Введіть операцію (+, -, *, /):");

let result1: number;

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

alert(`Результат: ${result1}`);