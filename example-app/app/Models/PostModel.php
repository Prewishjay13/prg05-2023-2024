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
                'tags' => ['tag1', 'tag2'],
                'email' => 'test@gmail.com',
                'website' => 'www.test.com',
                'description' => 'dit is een blog post'
            ],
            [
                'id' => 2,
                'title' => 'Video',
                'tags' => ['tag3', 'tag4'],
                'email' => 'test2@gmail.com',
                'website' => 'www.test2.com',
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
