interface Product {
    name: string;
    category: string;
}

const products: Product[] = [
    { name: "Laptop", category: "Electronics" },
    { name: "Phone", category: "Electronics" },
    { name: "Desk", category: "Furniture" },
    { name: "Chair", category: "Furniture" },
    { name: "Apple", category: "Food" },
    { name: "Bread", category: "Food" },
    { name: "Headphones", category: "Electronics" },
];

const groupedProducts = products.reduce((groups, product) => {
    const category = product.category;
    if (!groups[category]) {
        groups[category] = [];
    }
    groups[category].push(product.name);
    return groups;
}, {} as Record<string, string[]>);

console.log("Товари за категоріями:");
for (const [category, items] of Object.entries(groupedProducts)) {
    console.log(` ${category}: ${items.join(", ")}`);
}
