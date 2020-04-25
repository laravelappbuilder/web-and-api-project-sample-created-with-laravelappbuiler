<template>
  <div>
    <h3>Update Category</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="category.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<button @click="updateCategory()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        category:{
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
  axios.get(window.location.origin+'/api/categories/'+this.$route.params.id,headers).then((response)=>{
    this.category = response.data.data;
  });
},
methods:{
  updateCategory:function(){
    var category = new FormData();
    for (let [key, value] of Object.entries(this.category)) {
      category.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/categories/'+this.$route.params.id,category,{headers:headers}).then((response)=>{
      this.$router.push({name:'category-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
