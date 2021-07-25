<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    public function userRel()
    {
        return $this->hasOne(User::class,'id','user_id'); // $this->relType(Model_name::class,'tb_field','another_tb_field')
    }

}
