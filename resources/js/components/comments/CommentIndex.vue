<template>
  <div v-if="comments.length>0">
      <div v-for="comment in comments">
        <router-link :to="comment.link">{{comment.comment}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        comments :[],
      };
},
created : function(){
  this.fetchComments();
},
methods:{
  fetchComments:function(){
    axios.get(window.location.origin+'/api/comments').then((response)=>{
      this.comments = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
