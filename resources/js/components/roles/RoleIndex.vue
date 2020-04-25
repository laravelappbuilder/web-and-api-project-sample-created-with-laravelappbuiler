<template>
  <div v-if="roles.length>0">
      <div v-for="role in roles">
        <router-link :to="role.link">{{role.name}}</router-link>
        <br>
      </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        roles :[],
      };
},
created : function(){
  this.fetchRoles();
},
methods:{
  fetchRoles:function(){
    axios.get(window.location.origin+'/api/roles').then((response)=>{
      this.roles = response.data.data;
    });
  },
}
}
</script>

<style lang="css" scoped>
</style>
