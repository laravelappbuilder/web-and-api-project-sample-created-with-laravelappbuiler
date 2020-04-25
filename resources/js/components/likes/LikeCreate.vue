<template>
  <div>
    <h3>Create New Like</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
					<label for="post_id">Post</label>
					<select v-model="like.post_id"   name="post_id"  class="form-control" >
				             <option v-for="post in posts" :value="post.id">{{ post.title }}</option>
				        </select>
					<small>{{errors.post_id_error}}</small>
				</div>

				<div class="form-group">
        	<label for="like">Like</label>
        	<input v-model="like.like"  type="number" name="like" value="" class="form-control">
        	<small>{{errors.like_error}}</small>
        </div>

				<button @click="submitLike()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
				posts:[],
				
        like:{
          post_id:0,
					like:'',
					
        },
        errors:{
          post_id_error:'',
					like_error:'',
					
        },
      };
},
created:function(){
	axios.get(window.location.origin+'/api/posts').then((response)=>{
		this.posts = response.data.data;
	});
	},
methods:{
  submitLike:function(){
    var like = new FormData();
    for (let [key, value] of Object.entries(this.like)) {
      like.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.post(window.location.origin+'/api/likes',like,{headers:headers}).then((response)=>{
      this.$router.push({name:'like-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
