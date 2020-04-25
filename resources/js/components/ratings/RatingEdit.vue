<template>
  <div>
    <h3>Update Rating</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
					<label for="post_id">Post</label>
					<select v-model="rating.post_id"   name="post_id"  class="form-control" >
				             <option v-for="post in posts" :value="post.id">{{ post.title }}</option>
				        </select>
					<small>{{errors.post_id_error}}</small>
				</div>

				<div class="form-group">
        	<label for="rating">Rating</label>
        	<input v-model="rating.rating"  type="number" name="rating" value="" class="form-control">
        	<small>{{errors.rating_error}}</small>
        </div>

				<button @click="updateRating()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
				posts:[],
				
        rating:{
          _method:'PUT',
          post_id:0,
					rating:'',
					
        },
        errors:{
          post_id_error:'',
					rating_error:'',
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/ratings/'+this.$route.params.id,headers).then((response)=>{
    this.rating = response.data.data;
  });
	axios.get(window.location.origin+'/api/posts').then((response)=>{
		this.posts = response.data.data;
	});
	
},
methods:{
  updateRating:function(){
    var rating = new FormData();
    for (let [key, value] of Object.entries(this.rating)) {
      rating.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/ratings/'+this.$route.params.id,rating,{headers:headers}).then((response)=>{
      this.$router.push({name:'rating-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
