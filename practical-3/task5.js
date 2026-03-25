var names = ["Greg", "Igor", "Ivan", "Bob", "Gregg"];
var nameLengths = names.reduce(function (obj, name) {
    obj[name] = name.length;
    return obj;
}, {});
console.log("Довжина імен:", nameLengths);
