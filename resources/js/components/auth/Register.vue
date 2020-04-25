<template>
  <div>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" action="/api/register" method="POST" >
        <div class="form-group">
	<label for="name">Name</label>
	<input v-model="user.name" type="text" name="name" value="" class="form-control">
	<small>{{errors.name_error}}</small>
</div>
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
			<div class="form-group">
	<label for="password_confirmation">Confirm Password</label>
	<input v-model="user.password_confirmation" type="password" name="password_confirmation" value="" class="form-control">
	<small>{{errors.password_confirmation_error}}</small>
</div>
			<button @click="register()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
  data:()=>({
    user:{
      name:'',
      email:'',
      password:'',
      password_confirmation:''
    },
    errors:{
      name_error:'',
      email_error:'',
      password_error:'',
      password_confirmation_error:''
    },
  }),
  methods:{
    register(){
      axios.post(window.location.origin+'/api/register',this.user).then((response)=>{
        localStorage.setItem('loggedin','true');
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
