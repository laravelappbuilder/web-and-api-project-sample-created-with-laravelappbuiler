<template>
  <div>
    <h3>Update Tag</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="tag.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<button @click="updateTag()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        tag:{
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
  axios.get(window.location.origin+'/api/tags/'+this.$route.params.id,headers).then((response)=>{
    this.tag = response.data.data;
  });
},
methods:{
  updateTag:function(){
    var tag = new FormData();
    for (let [key, value] of Object.entries(this.tag)) {
      tag.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/tags/'+this.$route.params.id,tag,{headers:headers}).then((response)=>{
      this.$router.push({name:'tag-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
