<template>
  <div>
    <h2>Create User</h2>
    <p class="mt-2 text-danger">{{ getUserMessage }}</p>
    <form @submit.prevent="createUser">
      <label for="name">名前<input v-model="name" id="name"></label>
      <label for="email">メールアドレス<input v-model="email" id="email"></label>
      <label for="password">パスワード<input v-model="pass" id="password"></label>
      <br>
      <button type="submit">作成</button>
    </form>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      name: '',
      email: '',
      pass: '',
      // error: false,
      getUserMessage: ""
    };
  },
  methods: {
    createUser:function(){
      axios.post("/api/createUser", {
        name: this.name,
        email: this.email,
        password: this.pass,
      })
      .then(response => {
        if(response.data.status_code == 201) {
          this.$router.push("/create-user-success");
        }else if(response.data.status_code == 500){
          this.getUserMessage = '既にアカウントは作成されています。'
        }
        this.getUserMessage = '登録時にエラーが発生しました。管理者に連絡してください。'
      })
      .catch(error => {
        console.log(error);
        this.getUserMessage = '登録時にエラーが発生しました。管理者に連絡してください。'
      });
    }
  }
};
</script>