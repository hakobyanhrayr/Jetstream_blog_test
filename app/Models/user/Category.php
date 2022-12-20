<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name','slug'];


    /**
     * @return LengthAwarePaginator
     */
    public function posts(): LengthAwarePaginator
    {
        return $this->belongsToMany(Post::class,'category_posts')->orderBy('created_at','DESC')->paginate(5);
    }
}
