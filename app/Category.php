<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];

    public function accounts()
    {
        return $this->belongsToMany('App\Account', 'category_account');
    }
}
