<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Writer extends Model
{
    //
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'writers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'num_posts'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

