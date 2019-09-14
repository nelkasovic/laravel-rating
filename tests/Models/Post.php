<?php

namespace Qlick\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Qlick\LaravelRating\Traits\Vote\Votable;
use Qlick\LaravelRating\Traits\Rate\Rateable;
use Qlick\LaravelRating\Traits\Like\Likeable;

class Post extends Model
{
    use Rateable, Votable, Likeable;

    protected $guarded = [];

    protected $table = 'users';
}
