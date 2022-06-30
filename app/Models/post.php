<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    
    protected $fillable = [ 
        'author', 
        'category_id' ,
        'title',
        'slug',
        'content'
    ];
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
	}
}
