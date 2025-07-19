<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    //
    use HasUuids;

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
    
}
