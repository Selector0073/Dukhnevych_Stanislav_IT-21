const numbers: number[] = [12, 45, 23, 67, 34, 89, 11, 56, 78, 90];

const arithmeticMean = numbers.reduce((sum, num) => sum + num, 0) / numbers.length;
const maxValue = Math.max(...numbers);
const minValue = Math.min(...numbers);
const sortedNumbers = [...numbers].sort((a, b) => a - b);

console.log("Масив:", numbers);
console.log("Середнє:", arithmeticMean);
console.log("Максимальне:", maxValue);
console.log("Мінамільне:", minValue);
console.log("Сотований:", sortedNumbers);
