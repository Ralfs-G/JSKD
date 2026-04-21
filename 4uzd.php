<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1>To Do App</h1>
<form id="ourForm">
    <input id="ourField" type="text" autocomplete="off">
    <button>Create item</button>
</form>

<h3>Need to Do</h3>
<ul id="ourList">
</ul>

<script>
    let ourForm = document.getElementById("ourForm");
    let ourField = document.getElementById("ourField");
    let ourList = document.getElementById("ourList");

    // Load items form localStorage on page load
    let savedItems = JSON.parse(localStorage.getItem("todoList")) || []
    savedItems.forEach(item => createItem(item));



    ourForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // console.log('submit');
        createItem(ourField.value);
        ourField.value = '';
        ourField.focus();
    })

    

    function createItem(x) {
        // console.log(x);
        let ourHTML = `<li>${x.trim()} <button onClick="deleteItem(this)">Delete</button></li>`
        // console.log(ourHTML);
        ourList.insertAdjacentHTML("beforeend", ourHTML)
        updateLocalStorage()

    }

    function deleteItem(elToDel) {
        elToDel.parentElement.remove()
    }

    function updateLocalStorage() {
    //    console.log(document.querySelectorAll("#ourList li"));
        let items = [];
        document.querySelectorAll("#ourList li").forEach(li => {
            // <li>job 1 <button>Delete</button></li>
            items.push(li.firstChild.textContent.trim()) // li = <li>, firstChild = job 1, textContent, izvdes tips
        })
        // console.log(items)
        localStorage.setItem("todoList", JSON.stringify(items))
    }

</script>
</body>
</html>