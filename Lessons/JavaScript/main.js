//	DEBUGGING LINE	//
// console.log("hello");
// console.warn("hello");
// console.error("hello");

// 	VARIABLES	//
//can update and declare again//
// var Name = "Ronald";
// var Name = "Vergel";

//can only update//
// let Name = "Ronald";
// Name = "Vergel";

//can't update and can't declare again//
// const Name = "Ronald";

//	ARRAY //
const Vegetables = ["Eggplant", "Cauliflower", "String Beans"];

//Add in a specific place of an array//
// Vegetables[3] = "Squash";

//Add in the end of an array//
// Vegetables.push("Carrots");

//Add in the start of an array//
// Vegetables.unshift("Asparagus");

//Remove in the end of an array//
// Vegetables.pop();

//check if its array//
// var checkArray = Array.isArray(Vegetables);

//look for the index of specific array data//
// var checkIndex = Vegetables.indexOf("Eggplant");

//remove one or more data from array//
// var deletedVeg = Vegetables.splice(0, 1);

// OBJECT LITERALS
//object
const tao = {
    firstName: "Ronald Vergel",
    lastName: "Dela Cruz",
    age: 22,
    favorites: ["black", "guyabano", "kamote", "programming", "apex"],
    familyMembers: {
        father: "Rony Dela Cruz",
        mother: "Analyn Dela Cruz",
        sister: "Trixie Anne Dela Cruz",
        brother: "John Ronnie Dela Cruz",
        niece: ["Princess Angel Joy Dela Cruz", "Eli Dela Cruz"],
    },
};

//object inside array
const Contacts = [
    {
        id: 1,
        fullname: "Ronald Vergel Dela Cruz",
        isSaved: "Phone",
    },
    {
        id: 2,
        fullname: "John Ronnie Dela Cruz",
        isSaved: "Phone",
    },
    {
        id: 3,
        fullname: "Trixie Anne Dela Cruz",
        isSaved: "SD",
    },
];

// LOOPING //
//for loop//
// for (let i = 0; i < Contacts.length; i++) {
//     console.log(Contacts[i].fullname);
// }

//while loop//
// let i = 0;
// while (i <= 10) {
//     console.log(`i is ${i}`);
//     i++;
// }

//for each//
// Contacts.forEach(function (contact) {
//     console.log(contact.fullname);
// });

//optimized for array loops
// for (let contact of Contacts) {
//     console.log(contact);
// }


// MAPPING // getting only the fullnames in an array
const contanctsFullname = Contacts.map(function (contanct) {
    return contanct.fullname;
});

console.log(contanctsFullname);
