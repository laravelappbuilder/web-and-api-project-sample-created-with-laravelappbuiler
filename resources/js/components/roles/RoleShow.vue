<template>
  <div>
      <div v-if="role!=null" id="role">
        <div>
          <h3><router-link :to="role.link">{{role.name}}</router-link></h3>

          {{role.created_at}}
          
        <div>
          <router-link :to="'/roles/'+$route.params.id+'/edit'" class="btn btn-primary">Edit</router-link>
          <button @click="deleteRole(role)" :to="'/roles/'+$route.params.id" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        role : null,
      };
},
created : function(){
  this.fetchRole();
},
methods:{
  fetchRole:function(){
    var id = this.$route.params.id;

    axios.get(window.location.origin+'/api/roles/'+id).then((response)=>{
      this.role = response.data.data;
    });
  },
  deleteRole(role){
    if (confirm('Delete '+role.name)) {
      let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
      axios.put(window.location.origin+'/api'+role.link,{_method:'DELETE'},{headers:headers}).then((response)=>{
        this.$router.push({name:'role-index'});
      });
    }
  },
}
}
</script>

<style lang="css" scoped>
</style>
