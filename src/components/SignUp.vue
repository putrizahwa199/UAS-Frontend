<template>
  <img class="logo" src="C:\Users\Adila\aditri-uas\public\assets\images\logo-inverse.png"/>
  <h1>Sign Up</h1>
  <div class="register">
    <input type="text" v-model="email" placeholder="Enter Email"/>
    <input type="password" v-model="password" placeholder="Enter Password"/>
    <button v-on:click="signUp">Sign Up</button>
    <p>
        <router-link to="/login">Login</router-link>
    </p>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'SignUp',
    data() {
        return {
            email:'',
            password:''
        }
    },
    methods:{
        async SignUp() {
            let result = await axios.post("http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=aditri&table=user", {
                email:this.email,
                password:this.password
            });

            console.warn(result);
            if (result.status==201) {
                localStorage.setItem("user-info",JSON.stringify(result.data))
                this.$router.push({name:'HomeView'})
            }
        }
    }
}
</script>

<style>

</style>