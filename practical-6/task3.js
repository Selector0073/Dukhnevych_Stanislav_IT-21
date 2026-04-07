function fetchData(id) {
    const delay = Math.floor(Math.random() * 2000) + 1000;
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(`Data for id=${id} (took ${delay}ms)`);
        }, delay);
    });
}

async function processData() {

        console.log("=== Parallel requests (Promise.all) ===");
        const startParallel = Date.now(); 

        const parallelResults = await Promise.all([
            fetchData(1),
            fetchData(2),
            fetchData(3),
        ]);

        console.log("Parallel results:", parallelResults);
        console.log(`Parallel block took: ${Date.now() - startParallel}ms\n`);

        console.log("=== Sequential requests (for-await-of) ===");
        const startSeq = Date.now();

        const requests = [fetchData(4), fetchData(5), fetchData(6)];

        for await (const result of requests) {
            console.log("Sequential result:", result);
        }

        console.log(`Sequential block took: ${Date.now() - startSeq}ms`);
        console.log(`Sequential block took: ${Date.now() - startParallel}ms`);
    }

processData().catch((err) => console.error("Error:", err));