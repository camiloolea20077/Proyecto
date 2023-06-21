<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy{
    
   use HandlesAuthorization;

    function autor(User $user, Category $category){
        if($user->email==$category->user){
            return true;
        }else{
            return false;
        }
    }
}
