<template>
  <div>
    <h3>Update Role</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="role.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<button @click="updateRole()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        role:{
          _method:'PUT',
          name:'',
					
        },
        errors:{
          name_error:'',
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/roles/'+this.$route.params.id,headers).then((response)=>{
    this.role = response.data.data;
  });
},
methods:{
  updateRole:function(){
    var role = new FormData();
    for (let [key, value] of Object.entries(this.role)) {
      role.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/roles/'+this.$route.params.id,role,{headers:headers}).then((response)=>{
      this.$router.push({name:'role-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
