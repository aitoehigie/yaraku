<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'author'];

    protected $visible = ['id', 'title', 'author'];

    protected $hidden = ['created_at', 'updated_at'];
}
