<template>
  <div v-if="tags.length>0">
      <div v-for="tag in tags">
        <router-link :to="tag.link">{{tag.name}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        tags :[],
      };
},
created : function(){
  this.fetchTags();
},
methods:{
  fetchTags:function(){
    axios.get(window.location.origin+'/api/tags').then((response)=>{
      this.tags = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
