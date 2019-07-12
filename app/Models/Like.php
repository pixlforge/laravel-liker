<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        // 'user_id'
    ];

    /**
     * Posts relationship.
     *
     * @return void
     */
    public function posts()
    {
        return $this->morphTo();
    }
}
