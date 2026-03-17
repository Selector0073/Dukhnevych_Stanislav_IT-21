let input_1: string | null = window.prompt("Введіть число 1:");
let input_2: string | null = window.prompt("Введіть число 2:");
let input_3: string | null = window.prompt("Введіть число 3:");

let number_1: number = Number(input_1);
let number_2: number = Number(input_3);
let number_3: number = Number(input_3);

const middle: number = (number_1 + number_2 + number_3) / 3;

console.log(middle);

console.log("Модуль: " + Math.abs(middle));
console.log("Округлення у меншу: " + Math.ceil(middle));
console.log("Округлення у більшу: " + Math.floor(middle));
console.log("Квадрат: " + middle ** 2);

if (middle % 5 == 0|| middle % 7 == 0) {
	console.log("Ділиться націло на 5 або 7");
} else {
	console.log("Не ділиться націло на 5 або 7");
}

if (number_1 + number_2 > number_3) {
	console.log("Трикутник існує");
} else {
	console.log("Трикутник не існує");
}
