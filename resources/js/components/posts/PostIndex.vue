<template>
  <div v-if="posts.length>0">
      <div v-for="post in posts">
        <router-link :to="post.link">{{post.title}}</router-link>
        {{post.coverimage}}<hr>
							{{post.body}}<hr>
							<br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        posts :[],
      };
},
created : function(){
  this.fetchPosts();
},
methods:{
  fetchPosts:function(){
    axios.get(window.location.origin+'/api/posts').then((response)=>{
      this.posts = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
