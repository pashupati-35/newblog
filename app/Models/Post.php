<?php

namespace App\Models;

use Couchbase\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='posts';
    protected $fillable=['category_id','title','slug','feature_image','short_description','description','view_count','status','created_by','updated_by'];


    public function  createdBy():BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }


    public function  updatedBy():BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);

    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);

    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
