const posts = [
    { title: "Post One", Body: "This is post one" },
    { title: "Post Two", Body: "This is post two" },
    { title: "Post Three", Body: "This is post three" },
];

function getPosts() {
    setTimeout(() => {
        let output = "";

        posts.forEach((post, index) => {
            output += `<li>${post.title}</li>`;
        });

        document.body.innerHTML = output;
    }, 2000);
}

function createPost(post, callback) {
    setTimeout(() => {
        posts.push(post);
        callback();
    }, 1000);
}

createPost({ title: "Post Four", Body: "This is post four" }, getPosts);
