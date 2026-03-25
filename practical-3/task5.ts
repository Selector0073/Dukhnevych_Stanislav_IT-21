const names: string[] = ["Greg", "Igor", "Ivan", "Bob", "Gregg"];

const nameLengths = names.reduce((obj, name) => {
    obj[name] = name.length;
    return obj;
}, {} as Record<string, number>);

console.log("Довжина імен:", nameLengths);
