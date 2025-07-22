<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    //
    use HasUuids;
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'isPublished', 'writer_id'];


    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

        protected static function booted(): void
    {
        // When a new post is created...
        static::created(function (Post $post) {
            // ...get its writer and increment their post count.
            $post->writer->increment('num_posts');
        });

        // When a post is deleted...
        static::deleted(function (Post $post) {
            // ...get its writer and decrement their post count.
            $post->writer->decrement('num_posts');
        });
    }
    
}
