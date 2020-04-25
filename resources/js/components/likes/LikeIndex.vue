<template>
  <div v-if="likes.length>0">
      <div v-for="like in likes">
        <router-link :to="like.link">{{like.like}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        likes :[],
      };
},
created : function(){
  this.fetchLikes();
},
methods:{
  fetchLikes:function(){
    axios.get(window.location.origin+'/api/likes').then((response)=>{
      this.likes = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
