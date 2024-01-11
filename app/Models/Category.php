<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='categories';
    protected $fillable = ['title','slug','rank','status','created_by','update_by'];

//    protected $primaryKey='categories_id';

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
