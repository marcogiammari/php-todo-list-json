<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <link rel="stylesheet" href="style.css">
</head>

<body class="bg-dark">
    <div id="app"class="container text-white py-5">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column gap-3">
                <h1>To Do List</h1>
                <table class="table table-primary table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="w-100" scope="col"></th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(toDo, i) in toDoList">
                            <th scope="row" class="d-flex align-items-center gap-3">
                                <span v-if="!toDo.edit" @click="updateTask(i)" :class="{'text-decoration-line-through': toDo.status}">
                                    {{ toDo.name }}
                                </span>
                                <div v-else class="input-group w-auto">
                                    <input @keyup.enter="editTxt(i)" v-model="toDo.newTxt" class="my-edit form-control" type="text">
                                    <button @click="editTxt(i)" class="btn btn-primary">Edit</button>
                                </div>
                                <button @click="toDoList[i].edit = !toDoList[i].edit" class="my-pen btn btn-light">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </th>
                            <td class="text-center">{{ toDo.status ? '&check;' : '&cross;'}}</td>
                            <td class="text-center">
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