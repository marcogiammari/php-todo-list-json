const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'api.php',
            toDoList: [],
            newTask: 'Prova'
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get(this.apiUrl)
            .then(response=> {
                this.toDoList = response.data;
            })
            .catch(error => {
                console.error('Error: ' + error);
            })
        },
        sendData(data) {
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.toDoList = response.data;
            }).catch(error => {
                console.error('Error: ' + error);
            })
        },
        addNewTask() {
            const data = {newTask: this.newTask};
            this.sendData(data);
        },
        updateTask(i) {
            const data = {updateTask: i};
            this.sendData(data);
        },
        deleteTask(i) {
            const data = {deleteTask: i};
            this.sendData(data);
        }
    }
}).mount("#app");