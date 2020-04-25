<?php

namespace App\Policies;

use App\User;
use App\Category;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true ) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(?User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
      if ($user->id==$category->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
      if ($user->id==$category->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
      if ($user->id==$category->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
      if ($user->id==$category->user_id ) {
        return true;
      }
    }
}
