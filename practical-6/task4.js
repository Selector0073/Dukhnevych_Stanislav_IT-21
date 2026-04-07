function fetchUser(userId) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (!userId) {
                reject(new Error("userId is missing"));
                return;
            }
            resolve({ id: userId, name: `User_${userId}` });
        }, 2000);
    });
}

function fetchOrders(userId) {
    return fetchUser(userId)
        .then((user) => {
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    if (!user) {
                        reject(new Error("User not found"));
                        return;
                    }
                    resolve([
                        { orderId: 101, item: "Book",   userId: user.id },
                        { orderId: 102, item: "Laptop", userId: user.id },
                    ]);
                }, 3000);
            });
        })
        .catch((err) => {
            throw new Error(`fetchOrders failed: ${err.message}`);
        });
}

async function getUserWithOrders(userId) {
    try {
        console.log(`Fetching user ${userId}...`);
        const user = await fetchUser(userId);
        console.log("User loaded:", user);

        console.log(`Fetching orders for user ${userId}...`);
        const orders = await fetchOrders(userId);
        console.log("Orders loaded:", orders);

        console.log("\n--- Summary ---");
        console.log("User:", user);
        console.log("Orders:", orders);

    } catch (err) {
        console.error("Something went wrong:", err.message);
    }
}

getUserWithOrders(40);