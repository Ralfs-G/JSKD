async function loadTasks() {
    let res = await fetch('index.php?action=get');
    let tasks = await res.json();

    let list = document.getElementById('taskList');
    list.innerHTML = '';

    tasks.forEach(t => {
        let li = document.createElement('li');
        if (t.status === 'done') li.classList.add('done');
        li.innerHTML = `
            <span style="${t.status === 'done' ? 'text-decoration: line-through;' : ''}">
                ${t.title}
            </span>
            <button onclick="toggle(${t.id})">Done/Undo</button>
            <button onclick="editTask(${t.id})">Edit</button>
            <button onclick="deleteTask(${t.id})">Delete</button>
        `;

        list.appendChild(li);
    });
}

async function addTask() {
    let input = document.getElementById('taskInput');

    if (!input.value.trim()) return alert("Tukšs!");

    await fetch('index.php?action=add', {
        method: 'POST',
        body: new URLSearchParams({ title: input.value })
    });

    input.value = '';
    loadTasks();
}

async function deleteTask(id) {
    if (!confirm("Dzēst?")) return;

    await fetch('index.php?action=delete', {
        method: 'POST',
        body: new URLSearchParams({ id })
    });

    loadTasks();
}

async function toggle(id) {
    await fetch('index.php?action=toggle', {
        method: 'POST',
        body: new URLSearchParams({ id })
    });

    loadTasks();
}

async function editTask(id) {
    let title = prompt("Jauns teksts:");
    if (!title) return;

    await fetch('index.php?action=edit', {
        method: 'POST',
        body: new URLSearchParams({ id, title })
    });

    loadTasks();
}

loadTasks();
