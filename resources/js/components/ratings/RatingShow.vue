<template>
  <div>
      <div v-if="rating!=null" id="rating">
        <div>
          <h3><router-link :to="rating.link">{{rating.rating}}</router-link></h3>

          {{rating.created_at}}
          
        <div>
          <router-link :to="'/ratings/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteRating(rating)" :to="'/ratings/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        rating : null,
      };
},
created : function(){
  this.fetchRating();
},
methods:{
  fetchRating:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/ratings/'+id).then((response)=>{
      this.rating = response.data.data;
    });
  },
  deleteRating(rating){
    if (confirm('Delete '+rating.rating)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+rating.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'rating-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
