const API_URL = "https://jsonplaceholder.typicode.com/posts";

const titleInput = document.getElementById("title");
const bodyInput  = document.getElementById("body");
const submitBtn  = document.getElementById("submit-btn");
const statusDiv  = document.getElementById("status");

async function createPost() {
    const title = titleInput.value;
    const body  = bodyInput.value;

    const postData = {
        title: title,
        body: body,
        userId: 1
    };

    const jsonString = JSON.stringify(postData);

    submitBtn.disabled    = true;
    submitBtn.textContent = "Submitting…";

    try {
        const response = await fetch(API_URL, {
            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: jsonString
        });

        const result = await response.json();

        console.log("Server response:", result);

        statusDiv.innerHTML = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Post created!</strong> Check the console for the server response.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;

        titleInput.value = "";
        bodyInput.value  = "";

    } catch (error) {
        console.error("Error details:", error);

        statusDiv.innerHTML = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Something went wrong.</strong> Check the console for details.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;

    } finally {
        submitBtn.disabled    = false;
        submitBtn.textContent = "Submit Post";
    }
}

submitBtn.addEventListener("click", createPost);