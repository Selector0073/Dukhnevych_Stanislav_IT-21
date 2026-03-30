const API_URL = "https://jsonplaceholder.typicode.com/users";

const output  = document.getElementById("output");
const spinner = document.getElementById("spinner");

async function loadUsers() {
    try {
        const response = await fetch(API_URL);

        const users = await response.json();

        spinner.style.display = "none";

        const list = document.createElement("ul");
        list.className = "list-group shadow-sm";

        for (const user of users) {
            const item = document.createElement("li");

            item.className = "list-group-item d-flex justify-content-between align-items-center";

            const name = document.createElement("span");
            name.className   = "fw-semibold";
            name.textContent = user.name;

            const email = document.createElement("span");
            email.className   = "badge bg-secondary";
            email.textContent = user.email;

            item.appendChild(name);
            item.appendChild(email);

            list.appendChild(item);
        }

        output.appendChild(list);

    } catch (error) {
        spinner.style.display = "none";

        output.innerHTML = `
        <div class="alert alert-danger" role="alert">
            <strong>Load error</strong> — could not fetch users. Check your connection.
        </div>`;

        console.error("Error details:", error);
    }
}

loadUsers();