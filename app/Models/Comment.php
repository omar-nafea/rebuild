<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['content', 'author'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
