<?php
// Admin Guard is (admin)
use App\Models\Category;
use App\Models\Post;

if(!function_exists('admin_guard')){
    function admin_guard(){
        return auth('admin');
    }
}

if(!function_exists('get_user_data')) {
    function get_user_data() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return auth($guard)->user();
            }
        }
        return null;
    }
}if(!function_exists('get_guard_name')) {
    function get_guard_name() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return $guard;
            }
        }
        return null;
    }
}

if (!function_exists('getCategoryActive')){
    function getCategoryActive()
    {
        return Category::whereStatus('active')->get();
    }
}

if (!function_exists('getPostCategory')){
    function getPostCategory($postId){
        $id = Post::findOrfail($postId);
        return $id->postCategories;
    }
}
if (!function_exists('postsTages')){
    function postsTages($postId){
        $id = Post::findOrfail($postId);
        return $id->postsTages;
    }
}

if (!function_exists('getTageActive')){
    function getTageActive()
    {
        return \App\Models\Tag::whereStatus('active')->get();
    }
}
