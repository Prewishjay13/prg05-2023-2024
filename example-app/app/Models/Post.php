<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
    
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company', 'like', '%' . $filters['search'] . '%');
        }
    }
    


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likedByUsers()
    {
        return $this->hasMany(User::class, 'user_id', 'id')->where('likes_given', '>', 0);
    }

    public function addLike()
    {
        $user = auth()->user();

        if ($user && !$user->hasLikedPost($this)) {
            $user->increment('likes_given');
            
            // Update liked_by-veld in de database
            $likedBy = json_decode($this->liked_by);
            $likedBy[] = $user->id;
            $this->update(['liked_by' => json_encode($likedBy)]);
        }
    }
    
}
