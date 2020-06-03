<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'id';
    public function article_contents()
    {
    return $this->hasMany(\App\Models\ArticleContent::class);
    }
}
