var userGuess;
var targetNumber = Math.floor(Math.random() * 100) + 1;
do {
    var input5 = prompt("Вгадайте число від 1 до 100 (введіть 'panic!' для виходу):");
    if (input5 === null || input5.toLowerCase() === "panic!") {
        console.log("Завершення програми...");
        break;
    }
    userGuess = Number(input5);
    if (isNaN(userGuess)) {
        console.log("Будь ласка, введіть коректне число.");
        continue;
    }
    if (userGuess < targetNumber) {
        console.log("Загадане число більше");
    }
    else if (userGuess > targetNumber) {
        console.log("Загадане число менше");
    }
    else {
        console.log("Вітаємо! Ви вгадали число!");
    }
} while (userGuess !== targetNumber);
