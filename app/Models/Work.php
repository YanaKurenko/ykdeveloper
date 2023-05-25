<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use CrudTrait;
    // use HasFactory;
    protected $table= 'works';
    public $timestamps=true;

    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
    public function docs(){
        return $this->hasMany(Document::class,'workId');
    }

    public function gallery(){
        return $this->hasMany(Gallery::class,'workId');
    }

}
