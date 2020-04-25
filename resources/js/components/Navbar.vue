<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <router-link class="navbar-brand" to="/">
            Laravel6Test
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
  <router-link class="nav-link" to="/roles">Role</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/categories">Category</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/posts">Post</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/comments">Comment</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/likes">Like</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/ratings">Rating</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/tags">Tag</router-link>
</li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <div v-if="loggedIn==false">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/login">Login</router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/register">Register</router-link>
                    </li>
                </div>
			<div v-if="loggedIn">
                    <li class="nav-item dropdown">
                        <router-link id="navbarDropdown" class="nav-link dropdown-toggle" to="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                             <span class="caret">{{user.name}}</span>
                        </router-link>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <li class="nav-item">
  <router-link class="nav-link" to="/roles/create">Add Role</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/categories/create">Add Category</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/posts/create">Add Post</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/comments/create">Add Comment</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/likes/create">Add Like</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/ratings/create">Add Rating</router-link>
</li>
		<li class="nav-item">
  <router-link class="nav-link" to="/tags/create">Add Tag</router-link>
</li>

<li class="nav-item">
  <a class="nav-link" @click="logout()">Logout</a>
</li>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
  </div>
</template>

<script>
export default {
  props:{
    user:{type:Object},
    loggedIn:{type:Boolean,default:false}
  },
  methods:{
    logout(){
      this.$emit('loggedOut');
    }
  }
}
</script>

<style lang="css" scoped>
</style>
