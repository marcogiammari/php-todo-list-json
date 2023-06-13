<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
    span {
        cursor: pointer;
    }
</style>

<body class="bg-dark">
    <div id="app"class="container text-white py-5">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column gap-3">
                <h1>To Do List</h1>
                <table class="table table-primary table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="w-100" scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(toDo, i) in toDoList">
                            <th scope="row" @click="updateTask(i)"><span :class="toDo.status ? 'text-decoration-line-through' : 'null'">{{ toDo.name }}</span></th>
                            <td>{{ toDo.status ? '&check;' : '&cross;'}}</td>
                            <td>
                                <button @click="deleteTask(i)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex gap-2">
                    <input v-model="newTask" type="text" placeholder="New Task">
                    <button @click="addNewTask" class="btn btn-warning">Add new task</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>