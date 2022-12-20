<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @return LengthAwarePaginator
     */
    public function posts(): LengthAwarePaginator
    {
        return $this->belongsToMany(Post::class,'post_tags')->orderBy('created_at','DESC')->paginate(5);
    }
}
