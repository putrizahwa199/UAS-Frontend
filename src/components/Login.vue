<template>
  <img class="logo" src="C:\Users\Adila\aditri-uas\public\assets\images\logo-inverse.png"/>
  <h1>Login</h1>
  <div class="login">
    <input type="text" v-model="email" placeholder="Enter Email"/>
    <input type="password" v-model="password" placeholder="Enter Password"/>
    <button>Login</button>
    <p>
        <router-link to="/signup">Sign Up</router-link>
    </p>
  </div>
</template>

<script>
export default {
    name: 'LoginView',
};
</script>

<style>

</style>