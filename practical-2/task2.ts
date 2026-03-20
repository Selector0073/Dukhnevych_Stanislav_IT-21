const input1: string | null = prompt("Введіть число n:");
const n: number = Number(input1);

if (!isNaN(n)) {
    for (let i = 2; i <= n; i += 2) {
        console.log(i);
    }
} else {
    console.error("Введено не коректне значення.");
}