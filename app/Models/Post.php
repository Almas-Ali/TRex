<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    use Likeable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
	}

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent');
    }
}
