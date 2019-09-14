# Note
This is a fork of https://github.com/mohamednagy/Laravel-rating. Since the original code does not work with Laravel 6, I decided to fork and update for testing purposes with newest Laravel update.

# Laravel-Ratings 
Laravel package that allows you to **rate,  like & dislike or vote up & down** your models with a simple and clear way. <br>
*If you see this packge can help, Don't skimp on me with a star :)*

## Rating
include `CanRate` trait into your user model to apply rating functionalties
```
use Qlick\LaravelRating\Traits\Rate\CanRate;

class User extends Model
{
    use CanRate;
```
include `Rateable` trait to your model that will be rateable
```
use Qlick\LaravelRating\Traits\Rate\Rateable;

class Post extends Model
{
    use Rateable;
```

now you can rate your models as the following:
```
$user->rate($postModel, 5);
```
get the average ratings of a model
```
$post->ratingsAvg();
```
get the total count of ratings of a model
```
$post->ratingsCount();
```

get the rated models by a user
```
$user->rated(); // returns a collection of rated models
```

## Voting
include `CanVote` trait into your user model to apply rating functionalties
```
use Qlick\LaravelRating\Traits\Vote\CanVote;

class User extends Model
{
    use CanVote;
```
include `Votable` trait to your model that will be votable
```
use Qlick\LaravelRating\Traits\Vote\Votable;

class Post extends Model
{
    use Votable;
```
now you can vote your model as the following:
```
// up vote or +1  your model
$user->upVote($postModel);

// down vote or -1 your model
$user->downVote($postModel);
```
get total votes count
```
$postModel->votesCount();
```
get total up votes count
```
$postModel->upVotesCount();
```
get total down votes count
```
$postModel->downVotesCount();
```

get the up voted models by a user
```
$user->upVoted(); // returns a collection of up voted models
```

get the down voted models by a user
```
$user->downVoted(); // returns a collection of down voted models
```

get the total voted models by a user
```
$user->voted(); // returns a collection of total voted models;
```

## Like & Dislike
include `CanLike` trait into your user model to apply like and dislike functionalties
```
use Qlick\LaravelRating\Traits\Like\CanLike;

class User extends Model
{
    use CanLike;
```
include `Likeabke` trait to your model that will be likeabke
```
use Qlick\LaravelRating\Traits\Like\Likeable;

class Post extends Model
{
    use Likeabke;
```
now you can like your model as the following:
```
// like
$user->like($postModel);

// dislike
$user->dislike($postModel);
```
get total likes count
```
$postModel->likesCount();
```
get total dislikes count
```
$postModel->dislikesCount();
```
get total likes and dislikes count
```
$postModel->likesDislikesCount();
```
get the liked models by a user
```
$user->liked(); // return a collection of liked models;
```
get the disliked models by a user
```
$user->disliked(); // return a collection of disliked models;
```
get the total liked and disliked models by a user
```
$user->likedDisliked(); // return a collection of liked and disliked models;
```

# Install

```
$ composer require qlick/laravel-rating
```

in your config/app.php
```
    'providers' => [
        ...
        Qlick\LaravelRating\LaravelRatingServiceProvider::class
    ],

    'aliases' => [
        ...
        "LaravelRating" => \Qlick\LaravelRating\LaravelRatingFacade::class,
    ]
```
> You don't need this step in laravel5.5 `package:discover`  will do the job :)

publish the migrations
```
$ php artisan vendor:publish --tag=laravelRatings
```

run the migrations
```
$ php artisan migrate
```

