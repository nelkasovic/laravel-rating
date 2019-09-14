<?php

namespace Qlick\LaravelRating\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Qlick\LaravelRating\Traits\Rate\CanRate;
use Qlick\LaravelRating\Traits\Vote\CanVote;
use Qlick\LaravelRating\Traits\Like\CanLike;

class User extends Model
{
    use CanRate, CanVote, CanLike;

    protected $guarded = [];

    protected $table = 'users';
}
