// DESTRUCTURING //
//desctructing in object/
// const person = {
//     firstname: "Ronald Vergel",
//     lastname: "Dela Cruz",
//     age: "22",
//     gender: "male",
//     favColor: "black",
//     getFullname: function () {
//         return firstname + " " + lastname;
//     },
// };

// const { firstname, lastname, age, gender, favColor, getFullname } = person;

//desctructing in an array/
// const number = [1, 3, 5, 9];

// const [first, second, third, fourth] = number;

//math functions destructuring
// const mathFunctions = function (x, y) {
//ordering is not a problem when using an object//
// return {
//     sum: "Sum is " + x + y,
//     diff: Math.abs(x - y),
//     prod: x * y,
//     quot: x / y,
// };

//ordering is important when using an array//
//     return [x + y, Math.abs(x - y), x * y, x / y];
// };

//object destruct//
// const { sum, diff, prod, quot } = mathFunctions(3, 7);

//array destruct//
// const [sum, diff, prod, quot] = mathFunctions(3, 7);

// console.log(sum, quot);

//Destructing inside a function//
// const GetPersonAge = function ({ age }) {
//     console.log(age);
// };

// GetPersonAge({
//     name: "Ronald",
//     age: 22,
// });

//Arrow Syntax//
function GetNameStandard() {
    console.log("Old Version");
}

const GetNameNew = () => {
    console.log("Latest Version");
};

GetNameStandard();
GetNameNew();
