<template>
  <div>
    <h3>Create New Category</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
        	<label for="name">Name</label>
        	<input v-model="category.name"  type="text" name="name" value="" class="form-control">
        	<small>{{errors.name_error}}</small>
        </div>

				<button @click="submitCategory()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
        category:{
          name:'',
					
        },
        errors:{
          name_error:'',
					
        },
      };
},
methods:{
  submitCategory:function(){
    var category = new FormData();
    for (let [key, value] of Object.entries(this.category)) {
      category.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/categories',category,{headers:headers}).then((response)=>{
      this.$router.push({name:'category-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
