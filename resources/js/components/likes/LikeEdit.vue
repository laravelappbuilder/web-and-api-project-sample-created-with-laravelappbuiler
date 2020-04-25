<template>
  <div>
    <h3>Update Like</h3>
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

				<button @click="updateLike()" type="submit" class="btn btn-primary">Submit</button>
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
          _method:'PUT',
          post_id:0,
					like:'',
					
        },
        errors:{
          post_id_error:'',
					like_error:'',
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/likes/'+this.$route.params.id,headers).then((response)=>{
    this.like = response.data.data;
  });
	axios.get(window.location.origin+'/api/posts').then((response)=>{
		this.posts = response.data.data;
	});
	
},
methods:{
  updateLike:function(){
    var like = new FormData();
    for (let [key, value] of Object.entries(this.like)) {
      like.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/likes/'+this.$route.params.id,like,{headers:headers}).then((response)=>{
      this.$router.push({name:'like-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
