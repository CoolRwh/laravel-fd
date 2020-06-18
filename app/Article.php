<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $fillable = ['title','user_id','desc','pic','type','content'];


    public function articleList(){
        $this->hasMany(User::class);
    }
}
