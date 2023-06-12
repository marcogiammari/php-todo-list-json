const { createApp } = Vue;

createApp({
    data() {
        return {
            number: 1,
            movies: []
        };
    },
    methods: {
    },
    mounted() {
        axios.get('./api.php').then(response=> {
            console.log(response.data);
            this.movies = response.data;
        }) 
    }
}).mount("#app");