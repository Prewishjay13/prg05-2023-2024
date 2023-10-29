<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'company', 'tags', 'email', 'website', 'description'];
    //other method appService provider poot function unguard and importing model class
    public function scopeFilter($query, array $filters){
        if($filters['genre'] ?? false){
            $query->where('genres', 'like', '%' . request('genre') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('genres', 'like', '%' . request('search') . '%')
                ->orWhere('artist', 'like', '%' . request('search') . '%');
        }
    }
        // Relationship To User
        public function user() {
            return $this->belongsTo(User::class, 'user_id');
        }
}
