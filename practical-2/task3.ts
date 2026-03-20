const input3: string | null = prompt("Введіть число n:");
let n1: number = Number(input3);

let result: number = 1;
let i: number = 1;

while (i <= n1) {
    result *= i;
    i++;
}

console.log(`Факторіал числа ${n1} дорівнює: ${result}`);