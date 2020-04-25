<template>
  <div>
    <h3>Create New Post</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
					<label for="category_id">Category</label>
					<select v-model="post.category_id"   name="category_id"  class="form-control" >
				             <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
				        </select>
					<small>{{errors.category_id_error}}</small>
				</div>

				<div class="form-group">
        	<label for="coverimage">Coverimage</label>
        	<input @change="uploadCoverimage($event)"  type="file" name="coverimage" value="" class="form-control">
        	<small>{{errors.coverimage_error}}</small>
        </div>

				<div class="form-group">
        	<label for="title">Title</label>
        	<input v-model="post.title"  type="text" name="title" value="" class="form-control">
        	<small>{{errors.title_error}}</small>
        </div>

				<div class="form-group">
        	<label for="body">Body</label>
        	<input v-model="post.body"  type="textarea" name="body" value="" class="form-control">
        	<small>{{errors.body_error}}</small>
        </div>

				<div class="form-group">
					<label for="tags">Tag</label>
					<select v-model="post.tags"   name="tags"  class="form-control"  multiple>
				             <option v-for="tag in tags" :value="tag.id">{{ tag.name }}</option>
				        </select>
					<small>{{errors.tags_error}}</small>
				</div>

				<button @click="submitPost()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
				categories:[],
				tags:[],
				
        post:{
          category_id:0,
					coverimage:'',
					title:'',
					body:'',
					tags:[],
					
        },
        errors:{
          category_id_error:'',
					coverimage_error:'',
					title_error:'',
					body_error:'',
					tags_error:[],
					
        },
      };
},
created:function(){
	axios.get(window.location.origin+'/api/categories').then((response)=>{
		this.categories = response.data.data;
	});
	axios.get(window.location.origin+'/api/tags').then((response)=>{
		this.tags = response.data.data;
	});
	},
methods:{
  submitPost:function(){
    var post = new FormData();
    for (let [key, value] of Object.entries(this.post)) {
      post.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/posts',post,{headers:headers}).then((response)=>{
      this.$router.push({name:'post-show',params:{slug:response.data}});
    });
  },
  uploadCoverimage($event){
		this.post.coverimage = $event.target.files[0];
	},
	
}
}
</script>

<style lang="css" scoped>
</style>
