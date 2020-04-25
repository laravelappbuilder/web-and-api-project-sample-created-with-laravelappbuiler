<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'ratings';

		protected $fillable = ['rating','post_id'];

		public function user(){
			return $this->belongsTo(User::class);
		}

		public function post(){
			return $this->belongsTo(Post::class);
		}

		
    
}
