const students = [
    { name: "Alice", grades: { Math: 12, Physics: 1, Chemistry: 6 } },
    { name: "Bob", grades: { Math: 7, Physics: 1, Chemistry: 7 } },
    { name: "Charlie", grades: { Math: 4, Physics: 12, Chemistry: 11 } },
    { name: "Diana", grades: { Math: 8, Physics: 12, Chemistry: 10 } },
];
const results = students.map(student => {
    const gradesValues = Object.values(student.grades);
    const averageScore = gradesValues.reduce((sum, grade) => sum + grade, 0) / gradesValues.length;
    return { name: student.name, averageScore };
});
console.log("Середній бал студентів:");
for (const student of results) {
    console.log(`${student.name}: ${student.averageScore.toFixed(2)}`);
}
