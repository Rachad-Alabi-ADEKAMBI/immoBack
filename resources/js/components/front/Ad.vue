<template> <br><br><br><br>
   <ul v-for="detail in details" :key="detail.id">
    <li>{{ detail.id }}</li>
   </ul>
  </template>


  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        details: [],
        id: '',
      };
    },
    created() {
      const regex = /\/ad\/(\d+)/;
      const match = regex.exec(window.location.href);
      this.id = match[1];
    },
    mounted() {
      this.getItem();
    },
    methods: {
      getItem() {
        axios.get('/adApi/' + this.id)
          .then(response => {
            this.details = response.data;
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      },
      format(num) {
        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        return res;
      }
    },
  };
  </script>
