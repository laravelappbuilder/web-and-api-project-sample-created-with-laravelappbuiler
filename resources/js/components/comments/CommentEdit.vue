<template>
  <div>
    <h3>Update Comment</h3>
    <hr>
    <div class="container">
    <form v-on:submit.prevent class="form-horizontal" >
        <div class="form-group">
					<label for="post_id">Post</label>
					<select v-model="comment.post_id"   name="post_id"  class="form-control" >
				             <option v-for="post in posts" :value="post.id">{{ post.title }}</option>
				        </select>
					<small>{{errors.post_id_error}}</small>
				</div>

				<div class="form-group">
        	<label for="comment">Comment</label>
        	<input v-model="comment.comment"  type="textarea" name="comment" value="" class="form-control">
        	<small>{{errors.comment_error}}</small>
        </div>

				<button @click="updateComment()" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>
</template>

<script>
export default {
    data() {
      return {
				posts:[],
				
        comment:{
          _method:'PUT',
          post_id:0,
					comment:'',
					
        },
        errors:{
          post_id_error:'',
					comment_error:'',
					
        },
      };
},
created : function(){
  let token = document.head.querySelector('meta[name="csrf-token"]').content;
  let headers = {'_token': token};
  axios.get(window.location.origin+'/api/comments/'+this.$route.params.id,headers).then((response)=>{
    this.comment = response.data.data;
  });
	axios.get(window.location.origin+'/api/posts').then((response)=>{
		this.posts = response.data.data;
	});
	
},
methods:{
  updateComment:function(){
    var comment = new FormData();
    for (let [key, value] of Object.entries(this.comment)) {
      comment.append(key,value);
    }

    let headers = {Accept: "application/json",Authorization: "Bearer "+localStorage.token};
    axios.put(window.location.origin+'/api/comments/'+this.$route.params.id,comment,{headers:headers}).then((response)=>{
      this.$router.push({name:'comment-show',params:{id:response.data}});
    });
  },
  
}
}
</script>

<style lang="css" scoped>
</style>
