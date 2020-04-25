<template>
  <div v-if="ratings.length>0">
      <div v-for="rating in ratings">
        <router-link :to="rating.link">{{rating.rating}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        ratings :[],
      };
},
created : function(){
  this.fetchRatings();
},
methods:{
  fetchRatings:function(){
    axios.get(window.location.origin+'/api/ratings').then((response)=>{
      this.ratings = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
