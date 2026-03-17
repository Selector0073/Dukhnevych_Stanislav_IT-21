const some_int: number = 15;
const numbers: Array<number> = [1, 2, 3];
const simple_numbers: Array<number> = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

console.log("Найменше: " + Math.min(...numbers));
console.log("Найбільше: " + Math.max(...numbers));

if (numbers[0] % 2 == 0 || numbers[1] % 2 == 0 || numbers[2] % 2 == 0 ) {
	console.log("Є парним");
}

if (numbers[0] > numbers[1] && numbers[1] < numbers[2]) {
	console.log(true);
} else {
	console.log(false);
}

if (simple_numbers.includes(some_int)) {
	console.log("Є простим");
} else {
	console.log("Не є простим");
}
