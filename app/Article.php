<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $table = 'articles';

    protected $fillable = ['title','user_id','desc','pic','type','content'];


}
