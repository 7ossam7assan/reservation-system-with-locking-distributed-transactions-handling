<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
//    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name' , 'username', 'email', 'password'
//    ];
//    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    /*
     * Get Todo of User
     *
     */
//    public function articles()
//    {
//        return $this->hasMany(Article::class, 'created_by');
//    }
    public function articles($id)
    {
        return $this->belongsToMany("articles",'users_articles','user_id','article_id',$id);
    }
}