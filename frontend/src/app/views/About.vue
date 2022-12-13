<template>
  <div>
    <p>名前: {{ user.name }}</p>
    <p>メールアドレス: {{ user.email }}</p>
    <button type="button" @click="logout">ログアウト</button>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      user: ""
    };
  },
  mounted() {
    axios.get("/api/user").then(response => {
      this.user = response.data;
    });
  },
  methods: {
    logout() {
      axios.post("/api/logout")
        .then(response => {
          console.log(response);
          this.$router.push("/login");
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>