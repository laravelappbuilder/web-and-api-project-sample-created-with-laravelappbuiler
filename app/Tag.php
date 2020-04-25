<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tags';

		protected $fillable = ['name'];

		public function user(){
			return $this->belongsTo(User::class);
		}

		public function posts(){
			return $this->hasMany(Post::class);
		}

		
    
}
