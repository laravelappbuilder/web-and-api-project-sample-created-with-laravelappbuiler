<template>
  <div v-if="categories.length>0">
      <div v-for="category in categories">
        <router-link :to="category.link">{{category.name}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        categories :[],
      };
},
created : function(){
  this.fetchCategories();
},
methods:{
  fetchCategories:function(){
    axios.get(window.location.origin+'/api/categories').then((response)=>{
      this.categories = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
