const input: string | null = prompt("Будь ласка, введіть ваш вік:");
const age: number = Number(input);

if (age < 18) {
    alert("Вам заборонено вхід");
} else if (age >= 18 && age <= 65) {
    alert("Ласкаво просимо!");
} else {
    alert("Будь ласка, будьте обережні!");
}