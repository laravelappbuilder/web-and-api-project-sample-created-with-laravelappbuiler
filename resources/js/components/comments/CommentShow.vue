<template>
  <div>
      <div v-if="comment!=null" id="comment">
        <div>
          <h3><router-link :to="comment.link">{{comment.comment}}</router-link></h3>

          {{comment.created_at}}
          
        <div>
          <router-link :to="'/comments/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteComment(comment)" :to="'/comments/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        comment : null,
      };
},
created : function(){
  this.fetchComment();
},
methods:{
  fetchComment:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/comments/'+id).then((response)=>{
      this.comment = response.data.data;
    });
  },
  deleteComment(comment){
    if (confirm('Delete '+comment.comment)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+comment.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'comment-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
