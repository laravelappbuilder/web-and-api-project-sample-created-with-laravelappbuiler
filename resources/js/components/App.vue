<template>
  <div>
    <navbar :user="user" :loggedIn="loggedIn" v-on:loggedOut="loggedOut($event)" :key="$route.path"></navbar>
    <br>
    <div class="container">
      <router-view
        :loggedIn="loggedIn"
        v-on:userAuthenticated="userAuthenticated($event)"
        :key="$route.path"

      ></router-view>
    </div>
  </div>
</template>

<script>
export default {
  data:()=>({
    loggedIn:false,
    user:{
      name:'',
      email:'',
    }
  }),
  created:function(){
    if (localStorage.getItem('loggedin')=='true' && localStorage.getItem('token')!=null) {
      this.authenticate();
    }
  },
  methods:{
    logout(){
      this.loggedIn = false;
      localStorage.removeItem('loggedin');
      localStorage.removeItem('name');
      localStorage.removeItem('email');
      localStorage.removeItem('token');
    },
    userAuthenticated($event){
      this.authenticate();
      this.$router.push({name:'profile'});
    },
    loggedOut($event){
      this.logout();
      this.$router.push({path:'/'});
    },
    authenticate(){
      this.loggedIn = true;
      this.user.name = localStorage.getItem('name');
      this.user.email = localStorage.getItem('email');
    }
  }
}
</script>

<style lang="css" scoped>
</style>
