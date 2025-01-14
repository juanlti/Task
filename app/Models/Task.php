<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Task extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable=['title','description','user_id','is_completed'];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    // una tarea compartida con muchos usuarios
    public function sharedWith():BelongsToMany{
        return $this->belongsToMany(User::class,'task_user')->withPivot('permission');
    }
}
