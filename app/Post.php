<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'posts';

		protected $fillable = ['coverimage','title','body','category_id'];

		public function user(){
			return $this->belongsTo(User::class);
		}

		public function category(){
			return $this->belongsTo(Category::class);
		}

		public function comments(){
			return $this->hasMany(Comment::class);
		}

		public function likes(){
			return $this->hasMany(Like::class);
		}

		public function ratings(){
			return $this->hasMany(Rating::class);
		}

		public function tags(){
			return $this->belongsToMany(Tag::class);
		}

		
    public function getRouteKeyName(){
			return 'slug';
		}
}
