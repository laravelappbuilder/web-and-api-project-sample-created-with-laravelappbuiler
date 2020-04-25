<template>
  <div>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" action="" method="POST" >
        <div class="form-group">
	<label for="email">Email Address</label>
	<input v-model="user.email" type="email" name="email" value="" class="form-control">
	<small>{{errors.email_error}}</small>
</div>
			<div class="form-group">
	<label for="password">Password</label>
	<input v-model="user.password" type="password" name="password" value="" class="form-control">
	<small>{{errors.password_error}}</small>
</div>
			<button @click="login()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
  data:()=>({
    user:{
      email:'',
      password:'',
    },
    errors:{
      email_error:'',
      password_error:'',
    }
  }),
  methods:{
    login(){
      axios.post(window.location.origin+'/api/login',this.user).then((response)=>{
        localStorage.setItem('loggedin',true);
        localStorage.setItem('name',response.data.user.name);
        localStorage.setItem('email',response.data.user.email);
        localStorage.setItem('token',response.data.access_token);
        this.$emit('userAuthenticated',response.data);
      });
    }
  }
}
</script>

<style lang="css" scoped>
</style>
