<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //made by:-  php artisan make:model Post -m (-m means to make a migration as well)
    protected $tablename='posts';
    public $primaryKey='id';
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
