<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='tags';
    protected $fillable=['title','slug','status','created_by','updated_by'];


    public function  createdBy():BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }


    public function  updatedBy():BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
