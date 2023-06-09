<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 
        'description',
        'user_id',
        'slug',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'post');
        //return $this->hasMany(Comment::class);
    }

    public function getCreatedAtAttribute($date)
    {
        //return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        return date('Y-m-d', strtotime($date));
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
