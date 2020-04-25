<template>
  <div>
      <div v-if="tag!=null" id="tag">
        <div>
          <h3><router-link :to="tag.link">{{tag.name}}</router-link></h3>

          {{tag.created_at}}
          
        <div>
          <router-link :to="'/tags/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteTag(tag)" :to="'/tags/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        tag : null,
      };
},
created : function(){
  this.fetchTag();
},
methods:{
  fetchTag:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/tags/'+id).then((response)=>{
      this.tag = response.data.data;
    });
  },
  deleteTag(tag){
    if (confirm('Delete '+tag.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+tag.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'tag-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
