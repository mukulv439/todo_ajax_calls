    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .task-list {
        list-style-type: none;
        padding: 0;
    }

    .task-item {
        background-color: #fff;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .task-item.completed {
        text-decoration: line-through;
        opacity: 0.7;
    }

    .delete-btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .add-task {
        margin-bottom: 10px;
    }

    .add-task input[type="text"] {
        padding: 8px;
        font-size: 16px;
        width: 60%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .add-task input[type="submit"] {
        padding: 8px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-task input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .show-all-btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
    }

    .show-all-btn:hover {
        background-color: #218838;
    }

    .confirmation-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 1000;
    }

    .confirmation-modal p {
        margin-bottom: 10px;
    }

    .confirmation-modal button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 20px;
        cursor: pointer;
        margin-right: 10px;
    }

    .confirmation-modal button:hover {
        background-color: #c82333;
    }

    .confirmation-modal button.cancel-btn {
        background-color: #6c757d;
    }

    </style>
    </head>
    <body>

    <div class="container">
    <div class="add-task">
        <input type="text" id="taskInput" placeholder="Enter task...">
        <input type="submit" value="Add Task" onclick="addTask()" required>
    </div>

    <ul id="taskList" class="task-list">
        <!-- Tasks will be added dynamically here -->
    </ul>

    <div id="confirmationModal" class="confirmation-modal">
        <p>Are you sure you want to delete this task?</p>
        <button onclick="deleteTaskConfirmed()" id="confirmDeleteBtn">Delete</button>
        <button class="cancel-btn" onclick="closeConfirmationModal()">Cancel</button>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    let tasks = []; // Array to store tasks globally

    // Function to fetch tasks from server and render on page load
    async function fetchTasks() {
        try {
        const response = await axios.get('/tasks');
        tasks = response.data; // Store tasks globally
        renderTasks(tasks);
        } catch (error) {
        console.error('Error fetching tasks:', error);
        }
    }

    // Function to render tasks on the page
    function renderTasks(tasks) {
        const taskList = document.getElementById('taskList');
        taskList.innerHTML = '';

        tasks.forEach(task => {
        const taskItem = document.createElement('li');
        taskItem.className = `task-item ${task.completed ? 'completed' : ''}`;
        taskItem.innerHTML = `
            <span>${task.title}</span>
            <span> ${task.completed ? 'Completed' : 'Pending'}</span>
          
            <input type="checkbox" onchange="toggleCompletion(${task.id},this.checked)" ${task.completed ? 'checked' : ''}>
              <button class="delete-btn" onclick="deleteTask(${task.id})">Delete</button>
        `;
        taskList.appendChild(taskItem);
        });
    }

    // Function to add a new task
    async function addTask() {
        const taskInput = document.getElementById('taskInput');
        const taskText = taskInput.value.trim();
        if (taskText === '') return alert("task not be empty");

        try {
        const response = await axios.post('/tasks', { title: taskText });
        const newTask = response.data;
        tasks.push(newTask); // Add new task to global tasks array
        renderTasks(tasks); // Render updated task list
        taskInput.value = ''; // Clear input field
        } catch (error) {
            alert(error.message)
        console.error('Error adding task:', error);
        }
    }

    // Function to toggle task completion status
    async function toggleCompletion(taskId, completed) {
        try {
        await axios.put(`/tasks/${taskId}`, { completed });
        const task = tasks.find(task => task.id === taskId);
        if (task) {
            task.completed = completed;
            renderTasks(tasks); // Render updated task list
        }
        } catch (error) {
        console.error('Error updating task:', error);
        }
    }

    // Function to delete a task
    function deleteTask(taskId) {
        const confirmationModal = document.getElementById('confirmationModal');
        confirmationModal.style.display = 'block';

        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        confirmDeleteBtn.onclick = async function () {
        try {
            await axios.delete(`/tasks/${taskId}`);
            tasks = tasks.filter(task => task.id !== taskId); // Remove deleted task from global tasks array
            renderTasks(tasks); // Render updated task list
            closeConfirmationModal(); // Close confirmation modal
        } catch (error) {
            console.error('Error deleting task:', error);
        }
        };
    }

    // Function to close delete confirmation modal
    function closeConfirmationModal() {
        const confirmationModal = document.getElementById('confirmationModal');
        confirmationModal.style.display = 'none';
    }

    // Initial fetch and render tasks on page load
    document.addEventListener('DOMContentLoaded', function () {
        fetchTasks();
    });
    </script>

    </body>
    </html>
