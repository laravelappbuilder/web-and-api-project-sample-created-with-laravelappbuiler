<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    		public function roles(){
			return $this->belongsToMany(Role::class);
		}

		public function categories(){
			return $this->hasMany(Category::class);
		}

		public function posts(){
			return $this->hasMany(Post::class);
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
			return $this->hasMany(Tag::class);
		}

		public function scopeIsadmin(){
			return $this->roles->contains('name','admin');
		}

		public function scopeIsEditor(){
			return $this->roles->contains('name','Editor');
		}

		public function scopeIsAuthor(){
			return $this->roles->contains('name','Author');
		}

		public function scopeIsSuperUser(){
			return $this->roles->contains('name','SuperUser');
		}

		
}
