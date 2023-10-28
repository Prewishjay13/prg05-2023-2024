<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    public static function allPosts(){

        return [
            [
                'id' => 1,
                'title' => 'Blog',
                'description' => 'dit is een blog post'
            ],
            [
                'id' => 2,
                'title' => 'Video',
                'description' => 'dit is een video post'
            ]
        ];
    }
    public static function findPost($id){
        $posts = self::allPosts();

        foreach($posts as $post){
            if($post['id'] == $id){
                return $post;
            }
        }
    }
}
