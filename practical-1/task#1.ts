const int: number = 1;
console.log(typeof int);

const float: number = 1.1;
console.log(typeof float);

const str: string = "1.1";
console.log(typeof str);

const str_two: string = "1";
console.log(typeof str_two);

const bool: boolean = true;
console.log(typeof bool);

console.log(parseFloat(str));
console.log(parseInt(str_two));

interface someone {
	name: string,
	age: number,
	can_drive: boolean
};  

const user_1: someone = {
	name: "greg",
	age: 15,
	can_drive: false
};

console.log(JSON.stringify(user_1));
