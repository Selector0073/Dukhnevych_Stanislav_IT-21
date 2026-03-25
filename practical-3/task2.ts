interface User {
    name: string;
    age: number;
}

const users: User[] = [
    { name: "Greg", age: 25 },
    { name: "Bob", age: 17 },
    { name: "Greggg", age: 30 },
    { name: "Igor", age: 16 },
    { name: "Ivan", age: 22 },
];

const adultUsers = users.filter(user => user.age > 18);
const usernames = users.map(user => user.name);
const averageAge = users.reduce((sum, user) => sum + user.age, 0) / users.length;

console.log("Дорослі:", adultUsers);
console.log("Імена:", usernames);
console.log("Середній вік:", averageAge);
