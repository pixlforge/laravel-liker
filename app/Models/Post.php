<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The maximum number of times a post can be liked by the same user.
     */
    const MAX_LIKES = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    public function maxLikesReachedFor(User $user)
    {
        return $this->likesRemainingFor($user) <= 0;
    }

    public function likesRemainingFor(User $user)
    {
        return self::MAX_LIKES - $this->likes->where('user_id', $user->id)->count();
    }

    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Likes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Likers has many Like through User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function likers()
    {
        return $this->hasManyThrough(User::class, Like::class, 'likeable_id', 'id', 'id', 'user_id')
            ->where('likeable_type', Post::class)
            ->groupBy('likes.user_id', 'users.id', 'likes.likeable_id');
    }
}
