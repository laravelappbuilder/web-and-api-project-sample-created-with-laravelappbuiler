<template>
  <div>
      <div v-if="category!=null" id="category">
        <div>
          <h3><router-link :to="category.link">{{category.name}}</router-link></h3>

          {{category.created_at}}
          
        <div>
          <router-link :to="'/categories/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteCategory(category)" :to="'/categories/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        category : null,
      };
},
created : function(){
  this.fetchCategory();
},
methods:{
  fetchCategory:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/categories/'+id).then((response)=>{
      this.category = response.data.data;
    });
  },
  deleteCategory(category){
    if (confirm('Delete '+category.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+category.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'category-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
