var users = [
    { name: "Greg", age: 25 },
    { name: "Bob", age: 17 },
    { name: "Greggg", age: 30 },
    { name: "Igor", age: 16 },
    { name: "Ivan", age: 22 },
];
var adultUsers = users.filter(function (user) { return user.age > 18; });
var usernames = users.map(function (user) { return user.name; });
var averageAge = users.reduce(function (sum, user) { return sum + user.age; }, 0) / users.length;
console.log("Дорослі:", adultUsers);
console.log("Імена:", usernames);
console.log("Середній вік:", averageAge);
