<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements Viewable
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    use Likeable;
    use SoftDeletes;
    use InteractsWithViews;

    protected $dates = ['deleted_at'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
	}

    public function comments(){
        return $this->hasMany(Comment::class)->count();
    }
}
