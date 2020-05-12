<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "account";
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_account');
    }

}
