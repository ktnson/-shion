<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //postに対すリレーション
    
    //「１対多」の関係なのでpostsと複数形にする
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
