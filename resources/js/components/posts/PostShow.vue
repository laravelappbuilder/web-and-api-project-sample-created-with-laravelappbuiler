<template>
  <div>
      <div v-if="post!=null" id="post">
        <div>
          <h3><router-link :to="post.link">{{post.title}}</router-link></h3>

          {{post.created_at}}<br>
          <img :src="post.coverimage" alt="Loading Image...."><br>
					{{post.body}}<hr>

        <div>
          <router-link :to="'/posts/'+$route.params.slug+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deletePost(post)" :to="'/posts/'+$route.params.slug" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        post : null,
      };
},
created : function(){
  this.fetchPost();
},
methods:{
  fetchPost:function(){
    var slug = this.$route.params.slug;

    axios.get(window.location.origin+'/api/posts/'+slug).then((response)=>{
      this.post = response.data.data;
    });
  },
  deletePost(post){
    if (confirm('Delete '+post.title)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+post.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'post-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
