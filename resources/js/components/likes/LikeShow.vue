<template>
  <div>
      <div v-if="like!=null" id="like">
        <div>
          <h3><router-link :to="like.link">{{like.like}}</router-link></h3>

          {{like.created_at}}
          
        <div>
          <router-link :to="'/likes/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteLike(like)" :to="'/likes/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        like : null,
      };
},
created : function(){
  this.fetchLike();
},
methods:{
  fetchLike:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/likes/'+id).then((response)=>{
      this.like = response.data.data;
    });
  },
  deleteLike(like){
    if (confirm('Delete '+like.like)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+like.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'like-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
