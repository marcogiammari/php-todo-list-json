const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'api.php',
            toDoList: [],
            newTask: '',
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
            if (this.newTask) {
                const data = {newTask: this.newTask};
                this.sendData(data);
            }
        },
        updateTask(i) {
            const data = {updateTask: i};
            this.sendData(data);
        },
        deleteTask(i) {
            const data = {deleteTask: i};
            this.sendData(data);
        },
        editTxt(i) {
            console.log(this.toDoList[i].newTxt);
            const data = {modifyTask: i, newTxt: this.toDoList[i].newTxt};
            this.sendData(data);
        },
    }
}).mount("#app");